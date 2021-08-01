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
      
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                              Paypal
                          </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                              Mpesa
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3" checked>
                            <label class="form-check-label" for="flexRadioDefault3">
                              Stripe
                            </label>
                          </div>
                          <button id="submit_booking" onClick="bookSeat();" class="btn btn-success btn-large" style="width:100%; color:white; font-weight:bold; font-size:20px; margin-top:10px;">Book Now</button>
                     </div>
                 </div>              
            </div>
          </div>
    </div>
</div>
@endsection