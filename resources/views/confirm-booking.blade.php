@extends('layouts.app',['backgroundcolor' => 'rgb(241,245,246)'])

@section('content')
<div class="container text-center" style="background-color:rgb(241,245,246)">   
    <div class="row text-center justify-content-center pt-5 pb-4">
        <div class="col-lg-7">
            <div class="feature-car-rent-box-1">
                 <div class="card card-default">
                     <div class="card-header">
                         <h2>Confirm Details</h2>
                     </div>
                     <div class="card-body text-left">
                        <h5 style="font-weight:bold; color:green;">Customer Info</h5>
                        <div><span>Customer Name : </span><span id="user_name">{{ Auth::user()->name }}</span></div>
                        <div><span>Customer ID : </span><span> {{ Auth::user()->phonenumber }}</span></div>
                        <div><span>Seat Number : </span><span id="seat_number"> {{ $booking_data['seat']}} </span></div>
                        <hr style="width:100%">
                        <h5 style="font-weight:bold; color:green;">Trave Info</h5>
                        <div><span>From  : </span><span>{{ substr($booking_data['vehicle_route'],0,strpos($booking_data['vehicle_route'],'-'))}}</span></div>
                        <div><span>To : </span><span> {{ substr($booking_data['vehicle_route'],strpos($booking_data['vehicle_route'],'-')+1) }}</span></div>
                        {{-- <div><span>Pickup Station : </span><span> Afya Center </span></div>
                        <div><span>Alight Station : </span><span> Thika </span></div> --}}
                        <div><span>Vehicle Number : </span><span id="vehicle_number"> {{ $booking_data['vehicle_number']}} </span></div>
                        <div><span>Departure Time: </span><span> {{ $booking_data['time']}} </span></div>

                        <hr style="width:100%">
                        <h5 style="font-weight:bold; color:green;">Amount Payable<span class="float-right">KSH {{ $booking_data['amount'] }}</span> </h5>
      
                        <fieldset class="mt-3" style="margin-bottom:-10px;">
                          <legend>Select payment method: </legend>
                          <input  class="mr-2 radio-1" onclick="paypalUnchosen" type="radio" name="radio-1" value="paypal" id="paypalrdid" checked>
                          <label for="radio-1">Paypal</label><br>

                          <input class="mr-2 radio-1" onclick="mpesaUnchosen" type="radio" name="radio-1" value="mpesa" id="mpesardid">
                          <label for="radio-2">Mpesa</label><br>

                          <input class="mr-2 radio-1" onclick="stripeUnchosen" type="radio" name="radio-1" value="stripe" id="striperdid">
                          <label for="radio-3">Stripe</label>
                        </fieldset>

                        <form class="paypal msg" id="paypal-form" action="/postpaywithpaypal" method="post">
                          @csrf
                          <input type="text" name="user_name" value="{{ Auth::user()->name }}" style="display:none">
                          <input type="text" name="vehicle_number" value="{{ $booking_data['vehicle_number']}}"  style="display:none">
                          <input type="text" name="seat_number" value="{{ $booking_data['seat']}}"  style="display:none">

                          <input type="number" name="amount" value="{{ App\Models\Vehicle::where('vehicle_numberplate',$booking_data['vehicle_number'])->get()[0]->vehicle_travel_amount; }}"  style="visibility:hidden">
                          <button type="submit" id="submit_booking"  class="btn btn-success btn-large" style="width:100%; color:white; font-weight:bold; font-size:20px; margin-top:10px;">Paypal</button>
                        </form>
                        <form class="mpesa msg" id="mpesa-form" action="/postpaywithmpesa" method="post" style="display:none">
                          @csrf
                          <input type="number" name="amount" value="{{ App\Models\Vehicle::where('vehicle_numberplate',$booking_data['vehicle_number'])->get()[0]->vehicle_travel_amount; }}"  style="visibility:hidden">
                          <button type="submit" id="submit_booking"  class="btn btn-success btn-large" style="width:100%; color:white; font-weight:bold; font-size:20px; margin-top:10px;">Mpesa</button>
                        </form>
                        <form class="stripe msg" id="stripe-form" action="/postpaywithstripe" method="postpaywithstripe" style="display:none">
                          @csrf
                          <input type="number" name="amount" value="{{ App\Models\Vehicle::where('vehicle_numberplate',$booking_data['vehicle_number'])->get()[0]->vehicle_travel_amount; }}"  style="visibility:hidden">
                          <button type="submit" id="submit_booking"  class="btn btn-success btn-large" style="width:100%; color:white; font-weight:bold; font-size:20px; margin-top:10px;">Stripe</button>
                        </form>
                     </div>
                 </div>              
            </div>
          </div>
    </div>
</div>
@endsection