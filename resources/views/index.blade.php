@extends('layouts.app',['backgroundcolor' => 'rgb(255,255,255)'])

@section('content')
      <div class="py-5" style="background-repeat:no-repeat; background-image: url({{ asset('front-end/images/hero_1.jpg')}})">
        <div class="container pt-1">
          <div class="row align-items-center">
            <div class="col-lg-5">
              <div class="feature-car-rent-box-1">
                    <form>
                        <div class="form-group">
                            <label style="font-weight:bold;">Customer Number</label>
                            <input type="text" class="form-control" placeholder="Name" style="border:solid 1px grey">
                        </div>
                        <div class="form-group">
                            <label style="font-weight:bold;">Customer ID Number</label>
                            <input type="text" class="form-control" placeholder="Name" style="border:solid 1px grey">
                        </div>
                        <div class="form-group">
                            <label style="font-weight:bold;">Vehicle Route</label>
                            <select class="form-select select2 pl-1" data-placeholder="Select a Role" style="width: 100%; height:50px;">
                              <option>Nairobi-Nakuru</option>
                              <option>Nairobi-Mombasa</option>
                              <option>Nairobi-Eldoret</option>
                              <option>Kisumu-Nairobi</option>
                            </select>
                          </div>
                        <div class="form-group">
                            <label style="font-weight:bold;">Vehicle Number</label>
                            <input type="text" class="form-control" placeholder="Name" style="border:solid 1px grey">
                        </div>
                        <div class="form-group">
                            <label style="font-weight:bold;">Seat Number (Available seats)</label>
                            <select class="form-select select2 pl-1" data-placeholder="Select a Role" style="width: 100%; height:50px;">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                                <option>11</option>
                                <option>12</option>
                            </select>
                        </div>
                           
                        <div class="form-group">
                            <label for="exampleInputPassword1" style="font-weight:bold;">Amount</label>
                            <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Amount" style="border:solid 1px grey;">
                        </div> 
                        <div class="form-group">
                          <label for="exampleInputPassword1" style="font-weight:bold;">Depature Date and Time</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Departure Date and Time" style="border:solid 1px grey;">
                       </div>
                        <div class="form-group">
                            <a href="/book-seat" type="submit" class="btn btn-success btn-large" style="width:100%; color:white; font-weight:bold; font-size:20px; margin-top:10px;">Book Now</a>
                        </div>                      
                    </form>                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section pt-7 pb-0 bg-light">
      <div class="container">
        <div class="row">
          <div class="col-12">
              <form class="trip-form mb-2">
                <div class="row align-items-center mb-4">
                  <div class="col-md-6">
                    <h3 class="m-0">Search for availables vacants and Books your seat Now</h3>
                  </div>
                  <div class="col-md-6 text-md-right">
                    <span class="text-primary">32</span> <span>vehicles available</span></span>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-3">
                    <label for="cf-1">Vehicle Route</label>
                    <input type="text"  placeholder="Your pickup address" class="form-control">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="cf-2">Date</label>
                    <input type="text" id="cf-2" placeholder="Your drop-off address" class="form-control">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="cf-3">Time</label>
                    <input type="text" id="cf-3" placeholder="Your pickup address" class="form-control datepicker px-3">
                  </div>
                  <div class="col-md-3 mt-4" >                 
                   <button type="submit" class="btn btn-success btn-large" style="width:100%; color:white; font-weight:bold; font-size:20px; margin-top:10px;">Search</button>
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
                      <table class="table table-striped " >
                        <thead>
                          <tr>
                            <th class="p-0">Vehicle</th>
                            <th  class="p-0">Route</th>
                            <th  class="p-0">Status</th>
                            <th  class="p-0">Action</th>
                                                       
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th  class="pl-0 pr-0">QRTSRV34</th>
                            <td  class="pl-2 pr-0">Nairobi-Kisumu</td>
                            <td  class="pl-0 pr-0">Full</td>
                            <td class="pl-1 pr-0">
                              <a href="/book-seat" class="btn btn-xs btn-success rounded-pill" style="font-weight:bold; color:white;"> Book</a>
                            </td>
                          </tr>
                          <tr>
                            <th  class="pl-0 pr-0">QRTSRV34</th>
                            <td  class="pl-2 pr-0">Nairobi-Kisumu</td>
                            <td  class="pl-0 pr-0">Full</td>
                            <td class="pl-1 pr-0">
                              <a href="/book-seat" class="btn btn-xs btn-success rounded-pill" style="font-weight:bold; color:white;"> Book</a>
                            </td>
                          </tr> 
                          <tr>
                            <th  class="pl-0 pr-0">QRTSRV34</th>
                            <td  class="pl-2 pr-0">Nairobi-Kisumu</td>
                            <td  class="pl-0 pr-0">Full</td>
                            <td class="pl-1 pr-0">
                              <a href="/book-seat" class="btn btn-xs btn-success rounded-pill" style="font-weight:bold; color:white;"> Book</a>
                            </td>
                          </tr> 
                          <tr>
                            <th  class="pl-0 pr-0">QRTSRV34</th>
                            <td  class="pl-2 pr-0">Nairobi-Kisumu</td>
                            <td  class="pl-0 pr-0">Full</td>
                            <td class="pl-1 pr-0">
                              <a href="/book-seat" class="btn btn-xs btn-success rounded-pill" style="font-weight:bold; color:white;"> Book</a>
                            </td>
                          </tr> 
                          <tr>
                            <th  class="pl-0 pr-0">QRTSRV34</th>
                            <td  class="pl-2 pr-0">Nairobi-Kisumu</td>
                            <td  class="pl-0 pr-0">Full</td>
                            <td class="pl-1 pr-0">
                              <a href="/book-seat" class="btn btn-xs btn-success rounded-pill" style="font-weight:bold; color:white;"> Book</a>
                            </td>
                          </tr> 
                          <tr>
                            <th  class="pl-0 pr-0">QRTSRV34</th>
                            <td  class="pl-2 pr-0">Nairobi-Kisumu</td>
                            <td  class="pl-0 pr-0">Full</td>
                            <td class="pl-1 pr-0">
                              <a href="/book-seat" class="btn btn-xs btn-success rounded-pill" style="font-weight:bold; color:white;"> Book</a>
                            </td>
                          </tr>                     
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


