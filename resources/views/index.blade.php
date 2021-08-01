@extends('layouts.app',['backgroundcolor' => 'rgb(255,255,255)'])

@section('content')
      <div class="py-5" style="background-repeat:no-repeat; background-image: url({{ asset('front-end/images/hero_1.jpg')}})">
        <div class="container pt-1" style="height:400px;">
          <div class="row align-items-center">

          </div>
        </div>
      </div>
    </div>
    <div id="searchBookingVehicle" class="site-section pt-7 pb-0 bg-light">
      <div class="container">
        <div class="row">
          <div class="col-12">
              <form class="trip-form mb-2">
                <div class="row align-items-center mb-4">
                  <div class="col-md-6">
                    <h3 class="m-0">Search for vehicles and Books your seat Now</h3>
                  </div>
                  <div class="col-md-6 text-md-right">
                    <span class="text-primary">{{ count($vehicles)}}</span> <span>vehicles available</span></span>
                  </div>
                </div>
                <div class="row">
                    <!-- Actual search box -->
                    <div class="form-group has-search" style="width:100%;">
                      <span class="fa fa-search form-control-feedback"></span>
                      <input id="searchvehicleinput" type="text" class="form-control" placeholder="Search for Available Vehicles By Route e.g. Nairobi-Mombasa or By Date e.g. 23 April etc" style="border:2px solid green; border-radius:33px;">
                    </div>

                </div>                 
              </form>
            </div>
        </div>
      </div>
    </div>
    <div class="container mt-3 mb-4">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
                <div class=" card-header"></div>
                <div class="card-body">
                      <table id="displayvehicle" class="table table-striped" >
                        <thead>
                          <tr>
                            <th class="p-0">Vehicle</th>
                            <th  class="p-0">Route</th>
                            <th  class="p-0">Departure Time</th>
                            <th  class="p-0">Action</th>
                                                       
                          </tr>
                        </thead>
                        <tbody>
                       @foreach ( $vehicles  as $vehicle )
                          <tr>
                            <th class="pl-1 pr-0">{{ $vehicle->vehicle_numberplate }}</th>
                            <td  class="pl-2 pr-0">{{ $vehicle->vehicle_route }}</td>
                            <td  class="pl-0 pr-0"> 
                              {{ date("h:i:s a jS F, Y", strtotime(App\Models\VehicleShedule::where('vehicle_id',$vehicle->id)->get('departuretime')->pluck('departuretime')->last())) }}
                            </td>
                            <td class="pl-1 pr-0">
                              <a href="/book-seat/{{ $vehicle->id }}" class="btn btn-xs btn-success rounded-pill" style="font-weight:bold; color:white;">Book</a>
                            </td>
                          </tr>
                          @endforeach
                          </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
    </div>
     

    <div class="site-section section-3" style="background-image: url({{asset('/front-end/images/hero_2.jpg')}});">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center mb-5">
            <h2 class="text-white">Our services</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4">
            <div class="service-1">
              <span class="service-1-icon">
                <span class="flaticon-car-1"></span>
              </span>
              <div class="service-1-contents">
                <h3>Repair</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, laboriosam.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="service-1">
              <span class="service-1-icon">
                <span class="flaticon-traffic"></span>
              </span>
              <div class="service-1-contents">
                <h3>Car Accessories</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, laboriosam.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="service-1">
              <span class="service-1-icon">
                <span class="flaticon-valet"></span>
              </span>
              <div class="service-1-contents">
                <h3>Own a Car</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, laboriosam.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="container site-section mb-5">
      <div class="row justify-content-center text-center">
        <div class="col-7 text-center mb-5">
          <h2>How it works</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo assumenda, dolorum necessitatibus eius earum voluptates sed!</p>
        </div>
      </div>
      <div class="how-it-works d-flex">
        <div class="step">
          <span class="number"><span>01</span></span>
          <span class="caption">Time &amp; Place</span>
        </div>
        <div class="step">
          <span class="number"><span>02</span></span>
          <span class="caption">Car</span>
        </div>
        <div class="step">
          <span class="number"><span>03</span></span>
          <span class="caption">Details</span>
        </div>
        <div class="step">
          <span class="number"><span>04</span></span>
          <span class="caption">Checkout</span>
        </div>
        <div class="step">
          <span class="number"><span>05</span></span>
          <span class="caption">Done</span>
        </div>

      </div>
    </div>
    <div class="site-section bg-light">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-7 text-center mb-5">
            <h2>Customer Testimony</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo assumenda, dolorum necessitatibus eius earum voluptates sed!</p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="testimonial-2">
              <blockquote class="mb-4">
                <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, deserunt eveniet veniam. Ipsam, nam, voluptatum"</p>
              </blockquote>
              <div class="d-flex v-card align-items-center">
                <img src="{{ asset('front-end/images/person_1.jpg')}}" alt="Image" class="img-fluid mr-3">
                <span>Mike Fisher</span>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="testimonial-2">
              <blockquote class="mb-4">
                <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, deserunt eveniet veniam. Ipsam, nam, voluptatum"</p>
              </blockquote>
              <div class="d-flex v-card align-items-center">
                <img src="{{ asset('front-end/images/person_2.jpg')}}" alt="Image" class="img-fluid mr-3">
                <span>Jean Stanley</span>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="testimonial-2">
              <blockquote class="mb-4">
                <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, deserunt eveniet veniam. Ipsam, nam, voluptatum"</p>
              </blockquote>
              <div class="d-flex v-card align-items-center">
                <img src="{{ asset('front-end/images/person_3.jpg')}}" alt="Image" class="img-fluid mr-3">
                <span>Katie Rose</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    @endsection


