@extends('layouts.app',['backgroundcolor' => 'rgb(255,255,255)'])

@section('content')

<div class="ftco-blocks-cover-1">
  <div class="py-5" style="background:#C33764; background:linear-gradient(rgba(29, 38, 113, 0.8), rgba(195, 55, 100, 0.8)), url({{ asset('front-end/images/car.jpg')}}); background-repeat:no-repeat; background-size:cover;">
    {{-- <img src="" alt=""> --}}
    <div class="container pt-1" style="height:500px;">
      <div class="row align-items-center justify-content-center" style="padding-top:230px;">
        <div class="col-lg-6 text-center pt-3">
          <h1 style="color:white; font-weight:bold; font-size:50px;">About Us</h1>
          <p style="color:white; font-weight:bold;">Read our story, how we started, our mission vision and values.</p>
        </div>
      </div>
      </div>
    </div>
  </div>

  <div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 mb-5 mb-lg-0 order-lg-2">
          <img src="{{ asset('front-end/images/mololine-about.jpg')}}" alt="Image" width="400" style="margin-right:-10px;" class="img-fluid">
        </div>
        <div class="col-lg-4 mr-auto">
          <h2>About Mololine</h2>
          <p>This shuttle company play a vital role in the following routes fot the Kenyan's passenger transport industry. The major routes are Naivasha, Eldoret, Kericho, Nakuru, Eldama Ravine, Kabarnet, Kisumu, Kitale and Nairobi</p>
        </div>
      </div>
    </div>
  </div>

  {{-- <div class="site-section bg-light">
    <div class="container">
      <div class="row justify-content-center text-center mb-5 section-2-title">
        <div class="col-md-6">
          <span class="text-primary">Our Team</span>
          <h2 class="mb-4">Meet Our Team</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis provident eius ratione velit, voluptas laborum nemo quas ad necessitatibus placeat?</p>
        </div>
      </div>
      <div class="row align-items-stretch">

        <div class="col-lg-4 col-md-6 mb-5">
          <div class="post-entry-1 h-100 person-1">
            
              <img src="{{ asset('front-end/images/person_1.jpg')}}" alt="Image"
               class="img-fluid">
          
            <div class="post-entry-1-contents">
              <span class="meta">Founder</span>
              <h2>James Doe</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, sapiente.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-5">
          <div class="post-entry-1 h-100 person-1">
            
              <img src="{{ asset('front-end/images/person_2.jpg')}}" alt="Image"
               class="img-fluid">
          
            <div class="post-entry-1-contents">
              <span class="meta">Founder</span>
              <h2>James Doe</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, sapiente.</p>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-5">
          <div class="post-entry-1 h-100 person-1">
            
              <img src="{{ asset('front-end/images/person_3.jpg') }}" alt="Image"
               class="img-fluid">
          
            <div class="post-entry-1-contents">
              <span class="meta">Founder</span>
              <h2>James Doe</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, sapiente.</p>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-5">
          <div class="post-entry-1 h-100 person-1">
            
              <img src="{{ asset('front-end/images/person_4.jpg')}}" alt="Image"
               class="img-fluid">
          
            <div class="post-entry-1-contents">
              <span class="meta">Founder</span>
              <h2>James Doe</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, sapiente.</p>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-5">
          <div class="post-entry-1 h-100 person-1">
            
              <img src="{{ asset('front-end/images/person_5.jpg')}}" alt="Image"
               class="img-fluid">
          
            <div class="post-entry-1-contents">
              <span class="meta">Founder</span>
              <h2>James Doe</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, sapiente.</p>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-5">
          <div class="post-entry-1 h-100 person-1">
            
              <img src="{{ asset('front-end/images/person_1.jpg') }}" alt="Image"
               class="img-fluid">
          
            <div class="post-entry-1-contents">
              <span class="meta">Founder</span>
              <h2>James Doe</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, sapiente.</p>
            </div>
          </div>
        </div>


      </div>
    </div>
  </div> --}}

  <div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 mb-5 mb-lg-0">
          <img src="{{ asset('front-end/images/mololine-about.jpg')}}" alt="Image" width="400" style="margin-right:-10px;" class="img-fluid">
        </div>
        <div class="col-lg-4">
          <h2>Our History</h2>
          <p>Mololine shuttle is the most reputable shuttle company which runs services from Nakuru to other towns in Kenya,
            leaving when full from opposite the Odeon Cinema. There are 10 seats, usually with belts, and driver tend to stick 
            to the speed limit.</p>
            <p>
              Kariuki is the chairperson of the Mololine services, which was intially started in 1994 with a vision of bringing order
              and comfort in the transport industry.
            </p>
        </div>
      </div>
    </div>
  </div>

@endsection