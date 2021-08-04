@extends('layouts.app',['backgroundcolor' => 'rgb(255,255,255)'])

@section('content')
<div class="ftco-blocks-cover-1">
  <div class="py-5" style="background:#C33764; background:linear-gradient(rgba(29, 38, 113, 0.8), rgba(195, 55, 100, 0.8)), url({{ asset('front-end/images/car.jpg')}}); background-repeat:no-repeat; background-size:cover;">
    {{-- <img src="" alt=""> --}}
    <div class="container pt-1" style="height:500px;">
      <div class="row align-items-center justify-content-center" style="padding-top:230px;">
        <div class="col-lg-6 text-center pt-3">
          <h1 style="color:white; font-weight:bold; font-size:50px;">Services</h1>
          <p style="color:white; font-weight:bold;">Check out the Services We Offer</p>
        </div>
      </div>
      </div>
    </div>
  </div>

  <div class="site-section mt-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="service-1 dark">
            <span class="service-1-icon">
              <img class="mt-3" src="{{ asset('front-end/images/car.png')}}" width="50" height="50">
            </span>
            <div class="service-1-contents">
              <h3>Travel</h3>
              <p>We offer traveling services for different routes such as Nairobi-Eldoret etc.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="service-1 dark">
            <span class="service-1-icon">
              <img class="mt-3" src="{{ asset('front-end/images/parcel.png')}}" width="50" height="50">
            </span>
            <div class="service-1-contents">
              <h3>Parcel Delivery</h3>
              <p>We offer parcel delivery between different places.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="service-1 dark">
            <span class="service-1-icon">
              <img class="mt-3" src="{{ asset('front-end/images/lease.png')}}" width="50" height="50">
            </span>
            <div class="service-1-contents">
              <h3>Vehicle Leasing</h3>
              <p>You can also lease some of our vehicles for your own use.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- HOW IT WORKS TIMELINE --}}
  <div class="container mt-3">
    <div class="row justify-content-center text-center">
      <div class="col-7 text-center mb-5">
        <h2>How it works</h2>
        <p>Want to book a seat,follow this steps and book a seat in minutes.</p>
      </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="main-timeline">
                <div class="timeline">
                    <a href="#" class="timeline-content">
                        <div class="timeline-icon"><i class="fa fa-user"></i></div>
                        <h3 class="title">1. Create an Account and Login</h3>
                        <p class="description">
                            Create an account by registering then login with the registered details.
                        </p>
                    </a>
                </div>
                <div class="timeline">
                    <a href="#" class="timeline-content">
                        <div class="timeline-icon"><i class="fa fa-rocket"></i></div>    
                        <h3 class="title">2. Navigate to Vehicle section</h3>
                        <p class="description">
                            Navigate to the vehicle section by scrolling down the home page or cliking the link Book Seat in the navigation bar.
                          </p>
                    </a>
                </div>
                <div class="timeline">
                  <a href="#" class="timeline-content">
                      <div class="timeline-icon"><i class="fa fa-search"></i></div>
                      <h3 class="title">3. Search For the Desired Vehicle</h3>
                      <p class="description">
                            Search for specific vehicle e.g. for the route Nairobi-Eldoret
                      </p>
                  </a>
              </div>
              <div class="timeline">
                <a href="#" class="timeline-content">
                    <div class="timeline-icon"><i class="fa fa-hand-pointer"></i></div>    
                    <h3 class="title">4. Select the Desired Seat Number</h3>
                    <p class="description">
                    Once you have find the desired vehicle click the book button and choose the desired seat                    
                    </p>
                </a>
            </div>
            <div class="timeline">
              <a href="#" class="timeline-content">
                  <div class="timeline-icon"><i class="fa fa-clipboard-check"></i></div>
                  <h3 class="title">5. Confirm Booking Details and Make Necessary Payments</h3>
                  <p class="description">
                      Click continue and confirm the booking details,make payments then click book seat, this will book the seat for you and create the receipt.
                  </p>
              </a>
          </div>
          <div class="timeline">
            <a href="#" class="timeline-content">
                <div class="timeline-icon"><i class="fa fa-print"></i></div>    
                <h3 class="title">6. Print Receipt</h3>
                <p class="description">
                  You can then print the receipt created upon booking a seat.
                </p>
            </a>
        </div>
        <div class="timeline">
          <a href="#" class="timeline-content">
              <div class="timeline-icon"><i class="fa fa-check"></i></div>
              <h3 class="title">7. Check the Bookings Records</h3>
              <p class="description">
                    You can confirm the booking you have created by clicking the "My Booking" link in the navigation bar.
              </p>
          </a>
      </div>
        </div>
        </div>
    </div>
</div>


@endsection