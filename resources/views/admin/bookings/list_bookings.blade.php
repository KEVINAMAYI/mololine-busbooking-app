@extends('../admin/layouts.app',['pageTitle' => 'Bookings'])


@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row  justify-content-end">
        <ol class="breadcrumb ">
          <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
          <li class="breadcrumb-item active">bookings</li>
        </ol>
     
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="container pl-2 pr-2 pt-3 pb-3">
<div class="row">
  <div class="col-lg-12 px-3">
    <!-- /.card -->
<div class="card ">
  <div class="card-header">
    <h3 class="card-title">Here you edit delete and view tickets for bookings</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>Customer Name</th>
        <th>Vehicle Number</th>
        <th>Seat Number</th>
        <th>Amount Paid</th>
        <th>Action</th>
      </tr>
      </thead>
      <tbody>

        @foreach ( $bookings as $booking )
          
        <tr>
          <td>{{ $booking->user->name }}</td>
          <td>{{ $booking->vehicle->vehicle_numberplate }}</td>
          <td>{{ $booking->seat->vehicle_seat_number }}</td>
          <td>{{ $booking->vehicle->vehicle_travel_amount }}</td>
          <td>
            <button onClick="passEditBookingID({{ $booking->id }})" class="btn btn-xs btn-info" style="font-weight:bold;" data-toggle="modal" data-target="#modal-edit-booking"> Edit</button>
            <a href="/admin/delete_booking/{{ $booking->id }}" class="btn btn-xs btn-danger" style="font-weight:bold;">Delete</a>
            <a href="/admin/ticket" class="btn btn-xs btn-warning" style="font-weight:bold; color:white;">view ticket</a>
    
          </td>
        </tr>

        @endforeach

      </tbody>
      <tfoot>
        <tr>
          <th>Customer Name</th>
          <th>Vehicle Number</th>
          <th>Seat Number</th>
          <th>Amount Paid</th>
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

<!-- edit booking modal -->
<div class="modal fade" id="modal-edit-booking">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title ml-3">Edit Booking</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        {{-- display error if any --}}
        <div id="editBookingErrors" class="alert alert-danger" style="display:none;">
          <ul class="list-group">
            <li id = "customerNameError" class="list-group-item text-danger"></li>
            <li id = "seatNumberError" class="list-group-item text-danger"></li>
            <li id = "vehicleNumberError" class="list-group-item text-danger"></li>
          </ul>
        </div>

        {{-- display success message --}}
        <div id="editBookingSuccessMessage" class="alert alert-success" style="display:none;">
            Booking record edited successfully
        </div>


        <form id="editBookingForm">
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1"> Cutomer Name</label>
              <input type="text" class="form-control" name="customerName" placeholder="Enter Name">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Vehicle Number</label>
              <input type="text" class="form-control" name="vehicleNumber" placeholder="Enter Vehicle Number">
            </div>
            <div class="form-group">
              <label>Edit Seat Number</label>
              <select type="number" name="seatNumber" class="select2" data-placeholder="Select a Role" style="width: 100%;">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>9</option>
                <option>10</option>
                <option>11</option>
              </select>
            </div>            
          </div>
          <input type="text" name="editBookingId" style="visibility:hidden">
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" onClick="editBooking()" class="btn btn-success btn-large" style="width:100%; font-weight:bold; font-size:20px; margin-top:-30px;">Submit</button>
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