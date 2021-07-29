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
                        <div><span>Customer Name : </span><span> Kevin Amayi</span></div>
                        <div><span>Customer ID : </span><span> 34643511</span></div>
                        <div><span>Seat Number : </span><span> 8 </span></div>
                        <hr style="width:100%">
                        <h5 style="font-weight:bold; color:green;">Trave Info</h5>
                        <div><span>From  : </span><span> Nairobi</span></div>
                        <div><span>To : </span><span> Nakuru</span></div>
                        <div><span>Pickup Station : </span><span> Afya Center </span></div>
                        <div><span>Alight Station : </span><span> Thika </span></div>
                        <div><span>Vehicle Number : </span><span> ARTDF345 </span></div>
                        <hr style="width:100%">
                        <h5 style="font-weight:bold; color:green;">Amount Payable<span class="float-right">$70/ KSH 800</span> </h5>
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
                          <a href="/ticket" type="submit" class="btn btn-success btn-large" style="width:100%; color:white; font-weight:bold; font-size:20px; margin-top:10px;">Pay Now</a>
                     </div>
                 </div>              
            </div>
          </div>

    </div>
</div>
@endsection