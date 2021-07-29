@extends('../admin/layouts.app',['pageTitle' => 'Book a Seat'])

@section('content')


<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row justify-content-end">
          <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
            <li class="breadcrumb-item active">vehicles</li>
          </ol>
       
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  
  <div class="container">
  <div class="row">
    <div class="col-lg-12 px-3">
      <!-- /.card -->
  <div class="card ">
    <div class="card-header">
      <h3 class="card-title">Here you can book a seat and print ticket</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Vehicle Number</th>
          <th>Route</th>
          <th>Travel Amount</th>
          {{-- <th>Status</th> --}}
          <th>Departure Time</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>  
            @foreach ( $vehicles as $vehicle)
            <tr>
                <td>{{ $vehicle->vehicle_numberplate }}</td>
                <td>{{ $vehicle->vehicle_route }}</td>
                <td> {{  $vehicle->vehicle_travel_amount }}</td>
                {{-- <td> {{  $vehicle->vehicle_status }}</td> --}}
                <td>
                @if (App\Models\VehicleShedule::where('vehicle_id',$vehicle->id)->get('departuretime')->pluck('departuretime')->last() == null) 
                  Not Sheduled
                @else
                {{ date("h:i:s a jS F, Y", strtotime(App\Models\VehicleShedule::where('vehicle_id',$vehicle->id)->get('departuretime')->pluck('departuretime')->last())) }}
                @endif
                </td>
                <td>
                    <button id="{{ $vehicle->id }}" onClick="passBookingVehicleID({{ $vehicle->id }})"   class="btn btn-xs btn-success" style="font-weight:bold; color:white" data-toggle="modal" data-target="#modal-book-seat">Book</button>
                </td>
            </tr>    
            @endforeach
        <tfoot>
          <tr>
            <th>Vehicle Number</th>
            <th>Route</th>
            <th>Status</th>
            <th>Travel Amount</th>
            <th>Action</th>
          </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
    </div>
  </div>
  </div>


  <!-- booking modal -->
<div class="modal fade" id="modal-book-seat">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title ml-3">Book a Seat</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

      {{-- display error if any --}}
        <div id="bookSeatErrors" class="alert alert-danger" style="display:none;">
          <ul class="list-group">
            <li id = "customerNameError" class="list-group-item text-danger"></li>
          </ul>
        </div>

        {{-- display success message --}}
        <div id="bookSeatSuccessMessage" class="alert alert-success" style="display:none;">
          Seat  Booked successfully
        </div>

          <form id="bookSeatForm">
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1"> Cutomer Name</label>
                <input type="email" class="form-control" name="customerName" placeholder="Enter Name">
              </div>
              <div class="form-group">
                <label>Available Seats</label>
                <select id="available_seats" type="number" class="select2" name="seatNumber" data-placeholder="Select a Role" style="width: 100%;">
                </select>
              </div>              
            </div>
            <!-- /.card-body -->
            <input type="text" style="visibility:hidden" name="bookingVehicleId">
            <div class="card-footer">
              <button onClick="bookSeat()" type="submit" class="btn btn-success btn-large" style="width:100%; font-weight:bold; font-size:20px; margin-top:-30px;">Book a seat</button>
            </div>
          </form>
        </div>
        <div class="modal-footer justify-content-right mr-3">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

@endsection
