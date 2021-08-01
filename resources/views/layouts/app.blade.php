<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=DM+Sans:300,400,700&display=swap" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('front-end/fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('front-end/css/style.css') }}">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg shadow-lg" style="background-color:white; opacity:0.8;">
            <div class="container">
                <a class="navbar-brand" style="font-weight:bold; font-family:'Nunito'; font-size:32px; color:rgb(40,50,60);" href="{{ url('/') }}">
                    {{ config('app.name', 'Mololine') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon">
                      <i class="fas fa-bars" style="color:rgb(40,50,60); font-size:28px;"></i>
                    </span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item"><a href="/index" class="nav-link" style="font-weight:bold; color:rgb(40,50,60);">Home</a></li>
                            <li class="nav-item" ><a href="/about" class="nav-link" style="font-weight:bold; color:rgb(40,50,60);" >About</a></li>
                            <li class="nav-item"><a href="/services" class="nav-link" style="font-weight:bold; color:rgb(40,50,60);"  >Services</a></li>
                            <li class="nav-item" ><a href="/index/#searchBookingVehicle" class="nav-link" style="font-weight:bold; color:rgb(40,50,60);" >Book a Seat </a></li>
                            <li class="nav-item" ><a href="/index" class="nav-link" style="font-weight:bold; color:rgb(40,50,60);" >My Bookings </a></li>
                           
                            <li ><a href="/contact" class="nav-link" style="font-weight:bold; color:rgb(40,50,60);">Contact</a></li>
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" style="font-weight:bold; color:rgb(40,50,60);" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" style="font-weight:bold; color:rgb(40,50,60);" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item"><a href="/index" class="nav-link" style="font-weight:bold; color:rgb(40,50,60);" >Home</a></li>
                            <li class="nav-item"><a href="/about" class="nav-link" style="font-weight:bold; color:rgb(40,50,60);">About</a></li>
                            <li class="nav-item"><a href="/services" class="nav-link" style="font-weight:bold; color:rgb(40,50,60);">Services</a></li>
                            <li class="nav-item"><a href="/index/#searchBookingVehicle" class="nav-link" style="font-weight:bold; color:rgb(40,50,60);" >Book a Seat </a></li>
                            <li class="nav-item" ><a href="/my-bookings/{{ Auth::user()->id }}" class="nav-link" style="font-weight:bold; color:rgb(40,50,60);" >My Bookings </a></li>
                            
                            <li class="nav-item"><a href="/contact" style="font-weight:bold; color:rgb(40,50,60);" class="nav-link">Contact</a></li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" style="font-weight:bold; color:rgb(40,50,60);" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  <div class="image float-left ml-3 mr-2">
                                    <img src="{{ asset('user_images/'. Auth::user()->avatar_name ) }}" alt="User Image" width="30" height="30" style="border-radius:50%;">
                                  </div>
                                  {{-- {{ Auth::user()->name }} --}}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main style="background-color:{{ $backgroundcolor }};">
            @yield('content')
        </main>
       
        {{-- FOOTER --}}
        <footer class="site-footer" style="background-color:rgb(40,50,60);">
            <div class="container">
              <div class="row">
                <div class="col-lg-3">
                  <h2 class="footer-heading mb-4">About Us</h2>
                      <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
                </div>
                <div class="col-lg-8 ml-auto">
                  <div class="row">
                    <div class="col-lg-3">
                      <h2 class="footer-heading mb-4">Quick Links</h2>
                      <ul class="list-unstyled">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Testimonials</a></li>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Privacy</a></li>
                        <li><a href="#">Contact Us</a></li>
                      </ul>
                    </div>
                    <div class="col-lg-3">
                      <h2 class="footer-heading mb-4">Quick Links</h2>
                      <ul class="list-unstyled">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Testimonials</a></li>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Privacy</a></li>
                        <li><a href="#">Contact Us</a></li>
                      </ul>
                    </div>
                    <div class="col-lg-3">
                      <h2 class="footer-heading mb-4">Quick Links</h2>
                      <ul class="list-unstyled">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Testimonials</a></li>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Privacy</a></li>
                        <li><a href="#">Contact Us</a></li>
                      </ul>
                    </div>
                    <div class="col-lg-3">
                      <h2 class="footer-heading mb-4">Quick Links</h2>
                      <ul class="list-unstyled">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Testimonials</a></li>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Privacy</a></li>
                        <li><a href="#">Contact Us</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row pt-5 mt-5 text-center">
                <div class="col-md-12">
                  <div class="border-top pt-5">
                    <p>
                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | by <a href="#" target="_blank" >Mololine</a>
                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                  </p>
                  </div>
                </div>
      
              </div>
            </div>
          </footer>
    </div>

    <script src="{{ asset('front-end/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('front-end/js/popper.min.js') }}"></script>
    <script src="{{ asset('front-end/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('front-end/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('front-end/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('front-end/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('front-end/js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('front-end/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('front-end/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('front-end/js/aos.js') }}"></script> 
    <script src="js/main.js"></script>

    <script>  

      //function for printing ticket
      function printTicket() {
      var printbtn = document.getElementById('printbtn');
      printbtn.style.visibility = 'hidden';
      window.print();
      printbtn.style.visibility = 'visible';
      window.location.href = 'http://localhost:8000/index';
      }

      //change the search border color on focus
      $("#searchvehicleinput").focus(function(){
        $(this).css("border-color", "orange");
      }); 

      $("#searchvehicleinput").focusout(function(){
        $(this).css("border-color", "green");
      }); 
          
          
     //filter vehicles by search input
      $("#searchvehicleinput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#displayvehicle tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });

      //function for printing ticket
      function printTicket() {
      var printbtn = document.getElementById('printbtn');
      printbtn.style.visibility = 'hidden';
      window.print();
      printbtn.style.visibility = 'visible';
      window.location.href = 'http://localhost:8000/index';
      }


      //book seat
      function bookSeat()
      {
         
        var user_name = $('#user_name').text();
        var seat_number = $('#seat_number').text();
        var vehicle_number = $('#vehicle_number').text();
        

        //csrf token for prevent cross-origin site
        $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

        });

          $.ajax({
          url:"/submit-booking-details",
          type:"POST",
          data:{
            user_name,
            seat_number,
            vehicle_number

          },
          
          //if vehicle is created successfully then display success message, reset form and hide modal
          success:function(response){

             seat_number = response.seat_number;
             vehicle_number = response.vehicle_number;
             from = response.from;
             to = response.to;
             travel_time = response.travel_time;
             amount_paid = response.amount_paid;
             window.location.href = "/ticket?seatnumber="+seat_number+
                                          "&vehiclenumber="+vehicle_number+
                                          "&from="+from+
                                          "&to="+to+
                                          "&travel_time="+travel_time+
                                          "&amountpaid="+amount_paid;

            },

          //if there is error display them accordingly
          error:function(response){
          

          }
        });

      }

      //display booking details
      function displayBookingDetails(bookingid)
      {

         //csrf token for prevent cross-origin site
         $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

        });

          $.ajax({
          url:"/get-booking-details/"+bookingid,
          type:"get",
          data:{},
          
          //if vehicle is created successfully then display success message, reset form and hide modal
          success:function(response){

            //set values for display
            $('#booking-username').text(response.username);
            $('#booking-phonenumber').text(response.userphonenumber);
            $('#booking-vehicle-number').text(response.vehiclenumber);
            $('#booking-seat-number').text(response.seatnumber);
            $('#booking-from').text(response.from);
            $('#booking-to').text(response.to);
            $('#booking-amount').text("KSH "+response.amount);
            $('#booking-time').text(response.traveltime);

            //show modal
            $('#modal-view-booking-details').modal('show');
             
             
            },

          //if there is error display them accordingly
          error:function(response){
          

          }
        });

      }


    </script> 

</body>
</html>
