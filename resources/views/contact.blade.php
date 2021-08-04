@extends('layouts.app',['backgroundcolor' => 'rgb(255,255,255)'])

@section('content')

<div class="ftco-blocks-cover-1">
  <div class="py-5" style="background:#C33764; background:linear-gradient(rgba(29, 38, 113, 0.8), rgba(195, 55, 100, 0.8)), url({{ asset('front-end/images/car.jpg')}}); background-repeat:no-repeat; background-size:cover;">
    {{-- <img src="" alt=""> --}}
    <div class="container pt-1" style="height:500px;">
      <div class="row align-items-center justify-content-center" style="padding-top:230px;">
        <div class="col-lg-6 text-center pt-3">
          <h1 style="color:white; font-weight:bold; font-size:50px;">Contact Us</h1>
          <p style="color:white; font-weight:bold;">Get in Touch and Let us Know your Queries </p>
        </div>
      </div>
      </div>
    </div>
  </div>

  <div class="site-section bg-light" id="contact-section">
    <div class="container">
      <div class="row justify-content-center text-center">
      <div class="col-7 text-center mb-5">
        <h2>Contact Us Or Use This Form To Book A Seat</h2>
      </div>
    </div>
      <div class="row">
        <div class="col-lg-8 mb-5" >
          <form action="#" method="post">
            <div class="form-group row">
              <div class="col-md-6 mb-4 mb-lg-0">
                <input type="text" class="form-control" placeholder="First name">
              </div>
              <div class="col-md-6">
                <input type="text" class="form-control" placeholder="First name">
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-12">
                <input type="text" class="form-control" placeholder="Email address">
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-12">
                <textarea name="" id="" class="form-control" placeholder="Write your message." cols="30" rows="10"></textarea>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-6 mr-auto">
                <input type="submit" class="btn btn-block btn-success text-white py-3 px-5" value="Send Message">
              </div>
            </div>
          </form>
        </div>
        <div class="col-lg-4 ml-auto">
          <div class="bg-white p-3 p-md-5">
            <h3 class="text-black mb-4">Contact Info</h3>
            <ul class="list-unstyled footer-link">
              <li class="d-block mb-3">
                <span class="d-block text-black">Address and Contact information 1:</span>
                <span>P. O. Box 34700, Nairobi,</span></li>
              <li class="d-block mb-3"><span class="d-block text-black">Landline Numbers :</span><span> +254 208 333 9296</span></li>
              <li class="d-block mb-3"><span class="d-block text-black">Mobile Numbers :</span><span>+254 722 761 512 / 711 341 093/ +254-051-2215529</span></li>
            </ul>
            <ul class="list-unstyled footer-link">
              <li class="d-block mb-3">
                <span class="d-block text-black">Address and Contact information 2:</span>
                <span>P.O.Box: 13668 – 20100 Nakuru</span></li>
              <li class="d-block mb-3"><span class="d-block text-black">Mobile Numbers :</span><span> (+254) 0733 778935 / +254-203556368 / +254722735607</span></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection