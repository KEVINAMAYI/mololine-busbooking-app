<?php

namespace App\Http\Controllers;

use URL;
use Input;
use Validator;
use Session;
use Redirect;
use App\Models\User;
use PayPal\Api\Item;
use PayPal\Api\Payer;
use PayPal\Api\Amount;
use App\Http\Requests;
use PayPal\Api\Details;
use PayPal\Api\Payment;
use App\Models\Vehicle;
use PayPal\Api\ItemList;
use PayPal\Api\WebProfile;
use App\Models\VehicleSeat;
use PayPal\Rest\ApiContext;
use App\Models\SeatBooking;
use PayPal\Api\InputFields;
use PayPal\Api\Transaction;
use Illuminate\Http\Request;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use App\Models\VehicleShedule;
use PayPal\Api\PaymentExecution;
use PayPal\Auth\OAuthTokenCredential;

class PaypalController extends Controller
{
    private $_api_context;

    public function __construct()
    {
            
        $paypal_configuration = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_configuration['client_id'], $paypal_configuration['secret']));
        $this->_api_context->setConfig($paypal_configuration['settings']);
    }

    public function payWithPaypal()
    {   
        return view('paywithpaypal');
    }

    public function postPaymentWithpaypal(Request $request)
    {
        $data = $request->all();
        $user_id = User::where('name',$data['user_name'])->get()[0]->id;
        $vehicle_id = Vehicle::where('vehicle_numberplate',$data['vehicle_number'])->get()[0]->id;
        $seat_id = VehicleSeat::where('vehicle_seat_number',$data['seat_number'])->get()[0]->id;
        
        //store the booking value in session
        Session::put('user_id',$user_id);
        Session::put('vehicle_id',$vehicle_id);
        Session::put('seat_id',$seat_id);
       
        
        $inputFields = new InputFields();
        $inputFields->setNoShipping(1)
        ->setAddressOverride(0);

        $webProfile = new WebProfile();
        $webProfile->setName(uniqid())
        ->setInputFields($inputFields)
        ->setTemporary(false);

        $createProfile = $webProfile->create($this->_api_context); 

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

    	$item_1 = new Item();

        $item_1->setName('Product 1')
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($request->get('amount'));

        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($request->get('amount'));

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Enter Your transaction description');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('status'))
            ->setCancelUrl(URL::route('status'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction))
            ->setExperienceProfileId($createProfile->getId()); // Important step.; 

        try {

            $payment->create($this->_api_context);

        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug'))
             {  
                session()->flash('error','Connection timeout, Please try again ');
                return Redirect::route('confirm-booking');     

            } 
            
            else 
            {
                session()->flash('error','Some error occur, sorry for inconvenient, Try again later');
                return Redirect::route('confirm-booking');                
            }
        }

        foreach($payment->getLinks() as $link) {
            if($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        
        Session::put('paypal_payment_id', $payment->getId());

        if(isset($redirect_url)) {            
            return Redirect::away($redirect_url);
        }

        \Session::put('error','Unknown error occurred, Try again later');
    	return Redirect::route('confirm-booking');
    }





    public function getPaymentStatus(Request $request)
    {        
        $payment_id = Session::get('paypal_payment_id');

        Session::forget('paypal_payment_id');
        if (empty($request->input('PayerID')) || empty($request->input('token'))) {
            \Session::put('error','Payment failed');
            return Redirect::route('paywithpaypal');
        }
        $payment = Payment::get($request->input('paymentId'), $this->_api_context);        
        $execution = new PaymentExecution();
        $execution->setPayerId($request->input('PayerID'));        
        $result = $payment->execute($execution, $this->_api_context);
        
        if ($result->getState() == 'approved') {    
            session()->flash('booking-success','Payment successful, you can print your receipt !!');     
        
        //get data store in the session
        $user_id = Session::get('user_id');
        $vehicle_id = Session::get('vehicle_id');
        $seat_id = Session::get('seat_id');

        //update booking 
        $SeatBooking = SeatBooking::create([
        'user_id' => $user_id,
        'vehicle_id' => $vehicle_id,
        'seat_id' =>  $seat_id
            ]);

        $user_name = User::where('id',$user_id)->get()[0]->name;
        $user_phonenumber = User::where('id',$user_id)->get()[0]->phonenumber;
        $vehicle_route = Vehicle::where('id',$vehicle_id)->get()[0]->vehicle_route;
        $from = substr($vehicle_route,0,strpos($vehicle_route,'-'));
        $to = substr($vehicle_route,strpos($vehicle_route,'-')+1);
        $travel_time = date("h:i:s a jS F, Y", strtotime(VehicleShedule::where('vehicle_id',$seat_id)->get('departuretime')->pluck('departuretime')->last()));
        $amount_paid = Vehicle::where('id',$vehicle_id)->get()[0]->vehicle_travel_amount;
        $seat_number = VehicleSeat::where('id',$seat_id)->get()[0]->vehicle_seat_number;
        $vehicle_number = Vehicle::where('id',$vehicle_id)->get()[0]->vehicle_numberplate;

        $ticket_data = array();
        $ticket_data['user_name'] = $user_name;
        $ticket_data['user_phonenumber'] = $user_phonenumber;
        $ticket_data['vehicle_route'] = $vehicle_route;
        $ticket_data['from'] = $from;
        $ticket_data['to'] = $to;
        $ticket_data['travel_time'] = $travel_time;
        $ticket_data['seat_number'] = $seat_number;
        $ticket_data['vehicle_number'] = $vehicle_number;
        $ticket_data['amount_paid'] = $amount_paid;


       return view('ticket')->with('ticket_data',$ticket_data);

        }

        session()->flash('error','Payment failed !!');
		return redirect('/index');
    }

}
