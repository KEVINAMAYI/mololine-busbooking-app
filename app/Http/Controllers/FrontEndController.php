<?php


namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vehicle;
use App\Models\VehicleSeat;
use App\Models\SeatBooking;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\VehicleShedule;



class FrontEndController extends Controller
{
    //display available seats
    public function getAvailbaleVehicles()
    {

        $not_full_vehicles = Vehicle::where([
            ['vehicle_status','=','Not-full'],
            ['sheduled','=',true]
            ])
           ->get();


        return view('index')->with('vehicles',$not_full_vehicles);

    }

    //get vehicle booking details
    public function getVehicleBookingDetails($vehicleid)
    {
        
        // get the specific vehicle   
        $vehicle = Vehicle::where('id', $vehicleid)->get();
        
        /**
         *get seats for the specific vehicle
         */
        
        //get all booking records
        $bookings = SeatBooking::where('vehicle_id',$vehicleid)->get();
        
        //set booked seat to an empty array
        $bookedseats = array(); 
        
        //set number of all seats to empty array
        $allseats = array();
        
        //get ids for booked seats
        foreach ($bookings as $booking)
        {
            array_push($bookedseats,$booking->seat_id);
        }
        
        //get all seats
        for($i = 0; $i < 14 ; $i++)
        {
            
            array_push($allseats,VehicleSeat::all()[$i]->id);
        }
        
        //unbooked seats
        $unbookedseats = array_diff($allseats,$bookedseats);

        //check if all seats are booked and update the database
        if(count($unbookedseats) == 0 )
        {
            Vehicle::where(
                'id',$vehicleid)
                ->update([
                'vehicle_status' => 'Full'
                ]);

            return redirect('/index');
        }
        else
        {
            return view('book-seat')->with(['vehicle' => $vehicle,
                                           'available_seats'=> $unbookedseats]);
        }
        


    }


    //display booking confirmation details
    public function getConfirmationDetails(Request $request)
    {

        $booking_data = $request->all();
        // dd($booking_data);
        return view('confirm-booking')->with('booking_data', $booking_data);

    }


    // display bookings
    public function displayBookings($user_id)
    {
       
        $bookings = SeatBooking::where('user_id',$user_id)->get();
        return view('mybookings')->with('bookings',$bookings);


    }

    //get booking details
    public function getBookingDetails($bookingid)
    {

        $booking = SeatBooking::where('id',$bookingid)->get();
        $vehicleid = $booking[0]->vehicle_id; 
        $userid = $booking[0]->user_id; 
        $seatid = $booking[0]->seat_id; 
        $seatnumber = VehicleSeat::where('id',$seatid)->get()[0]->vehicle_seat_number;
        $username = User::where('id',$userid)->get()[0]->name;
        $userphonenumber = User::where('id',$userid)->get()[0]->phonenumber;
        $vehiclenumber = Vehicle::where('id',$vehicleid)->get()[0]->vehicle_numberplate;
        $vehicleroute = Vehicle::where('id',$vehicleid)->get()[0]->vehicle_route;
        $amount = Vehicle::where('id',$vehicleid)->get()[0]->vehicle_travel_amount;
        $travel_time = date("h:i:s a jS F, Y", strtotime(VehicleShedule::where('vehicle_id',$vehicleid)->get('departuretime')->pluck('departuretime')->last()));
        $from = substr($vehicleroute,0,strpos($vehicleroute,'-'));
        $to = substr($vehicleroute,strpos($vehicleroute,'-')+1);
        
                
        return response()->json([
            'username' => $username,
            'seatnumber' => $seatnumber,
            'userphonenumber' => $userphonenumber,
            'vehiclenumber' => $vehiclenumber,
            'from' => $from,
            'to' => $to,
            'traveltime' => $travel_time,
            'amount' => $amount
        ]);

    }

}
