<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token()}}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mololine | Admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">

  <link rel="stylesheet" href="{{ asset('plugins/dropzone/min/dropzone.min.css') }}">

  <link rel="stylesheet" href="{{ asset('plugins/bs-stepper/css/bs-stepper.min.css') }}">

  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">


  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <h4 class="ml-1 mt-2">{{ $pageTitle }}</h4>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
      
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">2</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <div class="image">
            <img src="{{ asset('user_images/'. Auth::user()->avatar_name ) }}" class="img-circle elevation-2" alt="User Image" width="30" height="30">
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
          {{-- <a class="nav-link pl-2 dropdown-item" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-cog mr-1"></i> <span>Settings</span> 
          </a> --}}
          <a class="nav-link pl-2 dropdown-item" href="/admin/logout">
            <i class="fas fa-walking mr-2"></i> <span>Logout</span> 
          </a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin/index" class="brand-link pl-4">
      <span class="brand-text font-weight-bold" style="font-size:28px;">Mololine </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/admin" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/users" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Users
              </p>
            </a>
          </li> 
          <li class="nav-item">
            <a href="/admin/vehicles" class="nav-link">
              <i class="nav-icon fas fa-car"></i>
              <p>
                Vehicles
              </p>
            </a>
          </li> 
          <li class="nav-item">
            <a href="/admin/display_book_seat" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Book a seat
              </p>
            </a>
          </li> 
          <li class="nav-item">
            <a href="/admin/bookings" class="nav-link">
              <i class="nav-icon fas fa-calendar"></i>
              <p>
                Bookings
              </p>
            </a>
          </li> 
          <li class="nav-item">
            <a href="/admin/reports"  class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Reports
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/logout" class="nav-link">
              <i class="nav-icon fas fa-walking"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
              
          </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
 
    {{-- display success message on a successful action --}}
    @if (session()->has('success'))
    <div class="alert alert-success mt-4 mb-3 ml-4 mr-4">
      {{ session()->get('success') }}
    </div>
    @endif
     
    @yield('content')
    <!-- /.content -->



  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong style="color:rgb(40, 50,60)">Copyright &copy; 2021 | Mololine</strong>
     <span style="color: purple;">All rights reserved</span> 
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
<!-- date-range-picker -->
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>


<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>

<script>

//function for sheduling vehicle
function passSheduleVehicleID(id)
{

  $("input[name=sheduleVehicleId]").val(id);

}

//function for resheduling vehicle
function passResheduleVehicleID(id)
{

  $("input[name=resheduleVehicleId]").val(id);

}

//random color generator
function getRandomColor() {
  var letters = '0123456789ABCDEF';
  var color = '#';
  for (var i = 0; i < 6; i++) {
    color += letters[Math.floor(Math.random() * 16)];
  }
  return color;
}

window.onload = function printReports()
{

  $.ajax({
        url:"/admin/generate_reports_data",
        type:"GET",
        data:{},
        
        //get vehicle data and display them
        success:function(response){
           
           //get data for bookings per route
           var bookings_per_route = response.bookings_per_route;
           var route_names = [];
           var route_bookings = [];
           var bookings_per_route_background_colors = [];
           for( var route_name in bookings_per_route )
           {

            route_names.push(route_name);
            route_bookings.push(bookings_per_route[route_name]);
            bookings_per_route_background_colors.push(getRandomColor());

           }


           //get data for vehicle per route
           var vehicle_per_route = response.vehicle_per_route;
           var vehicle_routes_names = [];
           var vehicles_count_per_route = [];
           var vehicles_per_route_background_colors = [];
           for( var vehicle_route_name in vehicle_per_route )
           {

            vehicle_routes_names.push(vehicle_route_name);
            vehicles_count_per_route.push(vehicle_per_route[vehicle_route_name]);
            vehicles_per_route_background_colors.push(getRandomColor());

           }


           //get data for monthly bookings
           var monthly_bookings_data = response.monthly_bookings;
           var months = [];
           var bookings = [];

           for( var month in monthly_bookings_data )
           {

            months.push(month);
            bookings.push(monthly_bookings_data[month]);

           }

           //get data for monthly revenue
           var monthly_revenue_data = response.monthly_revenues;
           var months_for_revenue = [];
           var revenues = [];

           for( var month_for_revenue in monthly_revenue_data)
           {
             months_for_revenue.push(month_for_revenue);
             revenues.push(monthly_revenue_data[month_for_revenue]);

           }

          //reports data
          var areaChartData2 = {
            labels  : months_for_revenue,
            datasets: [
            {
            label               : 'Monthly Revenue',
            backgroundColor     : '#23d32f',
            borderColor         : 'rgba(60,141,188,0.8)',
            pointRadius          : false,
            pointColor          : '#3b8bba',
            pointStrokeColor    : 'rgba(60,141,188,1)',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data                : revenues
            },
            ]
            }


            //-------------
            //- BAR CHART -
            //-------------
            var barChartCanvas = $('#barChart2').get(0).getContext('2d')
            var barChartData2 = $.extend(true, {}, areaChartData2)
            var temp0 = areaChartData2.datasets[0]
            barChartData2.datasets[0] = temp0

            var barChartOptions = {
            responsive              : true,
            maintainAspectRatio     : false,
            datasetFill             : false,
            scales: {
            yAxes: [{
            scaleLabel: {
            display: true,
            labelString: 'Revenue in Shillings (KSH)'
               }
            }],
            xAxes: [{
            scaleLabel: {
            display: true,
            labelString: 'Months of the Year'
            }
              }]
                 }
           }

            new Chart(barChartCanvas, {
            type: 'bar',
            data: barChartData2,
            options: barChartOptions
            })





            //reports data
            var areaChartData = {
            labels  : months,
            datasets: [
            {
            label               : 'Monthly Bookings',
            backgroundColor     : 'rgb(191,21,214)',
            borderColor         : 'rgba(60,141,188,0.8)',
            pointRadius          : false,
            pointColor          : '#3b8bba',
            pointStrokeColor    : 'rgba(60,141,188,1)',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data                : bookings
            },
            ]
            }

            //-------------
            //- BAR CHART -
            //-------------
            var barChartCanvas = $('#barChart').get(0).getContext('2d')
            var barChartData = $.extend(true, {}, areaChartData)
            var temp0 = areaChartData.datasets[0]
            barChartData.datasets[0] = temp0

            var barChartOptions = {
            responsive              : true,
            maintainAspectRatio     : false,
            datasetFill             : false,
            scales: {
            yAxes: [{
            scaleLabel: {
            display: true,
            labelString: 'Number of Bookings'
               }
            }],
            xAxes: [{
            scaleLabel: {
            display: true,
            labelString: 'Months of the Year'
            }
              }]
                 }
            }

            new Chart(barChartCanvas, {
            type: 'bar',
            data: barChartData,
            options: barChartOptions
            })


            //-------------
            //- DONUT CHART -
            //-------------
            // Get context with jQuery - using jQuery's .get() method.
            var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
            var donutData        = {
              labels:route_names,
              datasets: [
                {
                  data:route_bookings,
                  backgroundColor : bookings_per_route_background_colors,
                }
              ]
            }
            var donutOptions     = {
              maintainAspectRatio : false,
              responsive : true,
            }
            //Create pie or douhnut chart
            // You can switch between pie and douhnut using the method below.
            new Chart(donutChartCanvas, {
              type: 'doughnut',
              data: donutData,
              options: donutOptions
            })



            //-------------
            //- PIE CHART -
            //-------------
            // Get context with jQuery - using jQuery's .get() method.
            var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
            var pieData        = {
              labels:vehicle_routes_names,
              datasets: [
                {
                  data:vehicles_count_per_route,
                  backgroundColor :vehicles_per_route_background_colors,
                }
              ]
            };
            var pieOptions     = {
              maintainAspectRatio : false,
              responsive : true,
            }
            //Create pie or douhnut chart
            // You can switch between pie and douhnut using the method below.
            new Chart(pieChartCanvas, {
              type: 'pie',
              data: pieData,
              options: pieOptions
            })
           

          },

        //if there is error display them accordingly
        error:function(response){


          }
      });
  

}


//function for booking vehicle
function passBookingVehicleID(id)
{
  
  $("input[name=bookingVehicleId]").val(id);
  var vehicleid = id;

    $.ajax({
        url:"/admin/available_seats/"+vehicleid,
        type:"GET",
        data:{},
        
        //get vehicle data and display them
        success:function(response){
            
            //get the seats object
            var seats = response.unbooked_seats; 

            //loop through the seats
            for(var seat in seats )
            {

              $('#available_seats').append(new Option(seats[seat],seats[seat]));
              // console.log(seats[seat]);
            }

          },

        //if there is error display them accordingly
        error:function(response){

          console.log(response.responseJSON.errors);

          }
      });

}


//function for passing booking vehicle id and get the available seats
function passEditBookingID(id)
{
  $("input[name=editBookingId]").val(id);
 
}

//edit booking details
function editBooking()
{

  event.preventDefault();
  var customerName = $("input[name=customerName]").val();
  var seatNumber = $("select[name=seatNumber]").val();
  var vehicleNumber = $("input[name=vehicleNumber]").val();
  var bookingId = $("input[name=editBookingId]").val();


  $.ajax({
      url:"/admin/edit_booking",
      type:"POST",
      data:{

          vehiclenumber:vehicleNumber,
          customername:customerName,
          seatnumber:seatNumber,
          bookingid:bookingId

        },
      
      //get vehicle data and display them
      success:function(response){
        
        $('#editBookingSuccessMessage').show();
        $('#editBookingForm')[0].reset();
        $('#editBookingErrors').hide();

        },

      //if there is error display them accordingly
      error:function(response){

        $('#editBookingErrors').show();
        $('#customerNameError').text(response.responseJSON.errors.customername);
        $('#seatNumberError').text(response.responseJSON.errors.seatnumber);
        $('#vehicleNumberError').text(response.responseJSON.errors.customername);
        $('#editBookingSuccessMessage').hide();

      }
    });


}

//bookseat
function bookSeat()
{

  event.preventDefault();
  var customerName = $("input[name=customerName]").val();
  var seatNumber = $("select[name=seatNumber]").val();
  var vehicleId = $("input[name=bookingVehicleId]").val();


  $.ajax({
      url:"/admin/book_seat",
      type:"POST",
      data:{

          vehicleid:vehicleId,
          customername:customerName,
          seatnumber:seatNumber

        },
      
      //get vehicle data and display them
      success:function(response){
        
        $('#bookSeatSuccessMessage').show();
        $('#bookSeatForm')[0].reset();
        $('#bookSeatErrors').hide();

        },

      //if there is error display them accordingly
      error:function(response){

        $('#bookSeatErrors').show();
        $('#customerNameError').text(response.responseJSON.errors.customername);
        $('#bookSeatSuccessMessage').hide();

      }
    });

  


}

//sheduleVehicle
function sheduleVehicle()
{  

  event.preventDefault();
  var vehicleId = $("input[name=sheduleVehicleId]").val();
  var vehicleShedule = $("input[name=datetime]").val();

  $.ajax({
      url:"/admin/shedule_vehicle",
      type:"POST",
      data:{

          vehicleid:vehicleId,
          vehicleshedule:vehicleShedule,

        },
      
      //get vehicle data and display them
      success:function(response){
        
        $('#sheduleVehicleSuccessMessage').show();
        $('#sheduleVehicleForm')[0].reset();
        $('#sheduleVehicleErrors').hide();

        },

      //if there is error display them accordingly
      error:function(response){

        $('#sheduleVehicleErrors').show();
        $('#scheduleError').text(response.responseJSON.errors.vehicleshedule);
        $('#sheduleVehicleSuccessMessage').hide();

      }
    });

  

}



//reshedule Vehicle
function resheduleVehicle()
{  

  event.preventDefault();
  var vehicleId = $("input[name=resheduleVehicleId]").val();
  var vehicleShedule = $("input[name=redatetime]").val();

  $.ajax({
      url:"/admin/reshedule_vehicle",
      type:"POST",
      data:{
          vehicleid:vehicleId,
          vehicleshedule:vehicleShedule,

        },
      
      //get vehicle data and display them
      success:function(response){
        
        $('#resheduleVehicleSuccessMessage').show();
        $('#resheduleVehicleForm')[0].reset();
        $('#resheduleVehicleErrors').hide();
           
        },

      //if there is error display them accordingly
      error:function(response){


        $('#resheduleVehicleErrors').show();
        $('#rescheduleError').text(response.responseJSON.errors.vehicleshedule);
        $('#resheduleVehicleSuccessMessage').hide();

      }
    });

  

}

//display edit vehicle modal
function displayEditVehicle(id)
{
  $(function(){

    $.ajax({
      url:"/admin/edit_vehicle/"+id,
      type:"GET",
      
      //get vehicle data and display them
      success:function(response){
        
        $("input[name=editvehicleNumber]").val(response.data[0]['vehicle_numberplate']);
        $("select[name=editVehicleRoute]").val(response.data[0]['vehicle_route']);
        $("select[name=editvehicleStatus]").val(response.data[0]['vehicle_status']);
        $("input[name=editvehicleTravelAmount]").val(response.data[0]['vehicle_travel_amount']);
        $("input[name=editvehicleId").val(response.data[0]['id']);
        $('#modal-edit-vehicle').modal('show');

        },

      //if there is error display them accordingly
      error:function(response){
        console.log(response);

      }
    });


  });
}

  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });    
    

    //Date and time pickers
    $('#reservationdatetime').datetimepicker({ 
       icons: { time: 'far fa-clock' },
       widgetPositioning:{
        horizontal: 'auto',
        vertical: 'bottom'
    }
    
     });
    $('#reservationdatetime2').datetimepicker({ 
      icons: { time: 'far fa-clock' },
      widgetPositioning:{
        horizontal: 'auto',
        vertical: 'bottom'
    }
    
    });

    //toggle side bar
    // $("#my-toggle-button").ControlSidebar('toggle');

    //csrf token for prevent cross-origin site
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }

    });

    //submit vehicle data --> new vehicles
    $('.save-data').click(function(event){

      event.preventDefault();

      let vehiclenumber = $("input[name=vehicleNumber]").val();
      let vehicleroute = $("select[name=VehicleRoute]").val();
      let vehiclestatus = $("select[name=vehicleStatus]").val();
      let travelamount = $("input[name=vehicleTravelAmount]").val();

      $.ajax({
        url:"/admin/createvehicle",
        type:"POST",
        data:{

          vehiclenumber:vehiclenumber,
          vehicleroute:vehicleroute,
          vehiclestatus:vehiclestatus,
          travelamount:travelamount,

        },
        
        //if vehicle is created successfully then display success message, reset form and hide modal
        success:function(response){
          $('#vehicleRegistrationSuccessMessage').show();
          $('#createVehicleForm')[0].reset();
          $('#vehicleRegistrationErrors').hide();},

        //if there is error display them accordingly
        error:function(response){
          $('#vehicleRegistrationErrors').show();
          $('#vehicleNumberError').text(response.responseJSON.errors.vehiclenumber);
          $('#travelAmountError').text(response.responseJSON.errors.travelamount);
          $('#vehicleRegistrationSuccessMessage').hide();

        }
      })
      
    });

    //on modal close hide all the alerts
    $('#modal-add-vehicle').on('hidden.bs.modal',function(){
      $('#vehicleRegistrationErrors').hide();
      $('#vehicleRegistrationSuccessMessage').hide();
      location.reload();
    });
  

  });


    //submit edited vehicle data --> edited vehicle
    $('.save-edit-data').click(function(event){

      event.preventDefault();

      let vehiclenumber = $("input[name=editvehicleNumber]").val();
      let vehicleroute = $("select[name=editVehicleRoute]").val();
      let vehiclestatus = $("select[name=editvehicleStatus]").val();
      let travelamount = $("input[name=editvehicleTravelAmount]").val();
      let id = $("input[name=editvehicleId]").val();

      $.ajax({
        url:"/admin/update_vehicle/"+id,
        type:"POST",
        data:{

          vehiclenumber:vehiclenumber,
          vehicleroute:vehicleroute,
          vehiclestatus:vehiclestatus,
          travelamount:travelamount,

        },
        
        //if vehicle is created successfully then display success message, reset form and hide modal
        success:function(response){
          $('#editvehicleRegistrationSuccessMessage').show();
          $('#editcreateVehicleForm')[0].reset();
          $('#editvehicleRegistrationErrors').hide();},

        //if there is error display them accordingly
        error:function(response){

          $('#editvehicleRegistrationErrors').show();
          $('#editvehicleNumberError').text(response.responseJSON.errors.vehiclenumber);
          $('#edittravelAmountError').text(response.responseJSON.errors.travelamount);
          $('#editvehicleRegistrationSuccessMessage').hide();

        }
      })
      
    });

    //on modal close hide all the alerts
    $('#modal-edit-vehicle').on('hidden.bs.modal',function(){
      $('#editvehicleRegistrationErrors').hide();
      $('#editvehicleRegistrationSuccessMessage').hide();
      location.reload();
    });
  

     //on modal close hide all the alerts
     $('#modal-shedule-vehicle').on('hidden.bs.modal',function(){
      $('#sheduleVehicleSuccessMessage').hide();
      $('#sheduleVehicleErrors').hide();
      location.reload();
    });

    //on modal close hide all the alerts
    $('#modal-reshedule-vehicle').on('hidden.bs.modal',function(){
      $('#resheduleVehicleSuccessMessage').hide();
      $('#resheduleVehicleErrors').hide();
      location.reload();
    });


    //on modal close hide all the alerts
    $('#modal-book-seat').on('hidden.bs.modal',function(){
      $('#bookSeatSuccessMessage').hide();
      $('#bookSeatErrors').hide();
      location.reload();
    });


    //on modal close hide all the alerts
    $('#modal-edit-booking').on('hidden.bs.modal',function(){
      $('#editBookingSuccessMessage').hide();
      $('#editBookingErrors').hide();
      location.reload();
    });
  
</script>
</body>
</html>
