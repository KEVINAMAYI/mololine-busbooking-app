@extends('../admin/layouts.app',['pageTitle' => 'Vehicles'])


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
<div class="row px-2">
  <button class="btn btn-lg btn-info mt-1 mx-2 mb-3" data-toggle="modal" data-target="#modal-add-vehicle"> <i class="fas fa-plus text-white pr-2"></i>Add Vehicle</button>
</div>

<div class="row">
  <div class="col-lg-12 px-3">
    <!-- /.card -->
<div class="card ">
  <div class="card-header">
    <h3 class="card-title">Here you can add, edit, delete and shedule vehicles</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>Vehicle Number</th>
        <th>Route</th>
        <th>Travel Amount</th>
        <th>Departure Time</th>
        <th>Action</th>
      </tr>
      </thead>
      <tbody>
      @foreach ($vehicles as $vehicle )

      <tr>
        <td>{{ $vehicle->vehicle_numberplate }}</td>
        <td>{{ $vehicle->vehicle_route }}</td>
        <td> {{  $vehicle->vehicle_travel_amount }}</td>
        <td>
        @if (App\Models\VehicleShedule::where('vehicle_id',$vehicle->id)->get('departuretime')->pluck('departuretime')->last() == null) 
          Not Sheduled
        @else
        {{ date("h:i:s a jS F, Y", strtotime(App\Models\VehicleShedule::where('vehicle_id',$vehicle->id)->get('departuretime')->pluck('departuretime')->last())) }}
        @endif
        </td>
      <td>
        <button id="{{ $vehicle->id }}" onClick="displayEditVehicle({{ $vehicle->id }})" class="btn btn-xs btn-info editvehicle" style="font-weight:bold;"> Edit</button>
        <a href="/admin/deletevehicle/{{ $vehicle->id }}" class="btn btn-xs btn-danger" style="font-weight:bold;">Delete</a>
        
        @if($vehicle->sheduled == true)
        
        <button  onClick="passResheduleVehicleID({{ $vehicle->id }})"  class="btn btn-xs btn-success" style="font-weight:bold; color:white" data-toggle="modal" data-target="#modal-reshedule-vehicle">Reshedule</button>
        
        @else
        <button  onClick="passSheduleVehicleID({{ $vehicle->id }})" class="btn btn-xs btn-warning" style="font-weight:bold; color:white" data-toggle="modal" data-target="#modal-shedule-vehicle">shedule</button>

          
        @endif

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


<!-- Add Vehicle modal -->
<div class="modal fade" id="modal-add-vehicle">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title ml-3">Add Vehicle</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        {{-- display error if any --}}
        <div id="vehicleRegistrationErrors" class="alert alert-danger" style="display:none;">
          <ul class="list-group">
            <li id = "vehicleNumberError" class="list-group-item text-danger"></li>
            <li id = "travelAmountError" class="list-group-item text-danger"></li>
          </ul>
        </div>

        {{-- display success message --}}
        <div id="vehicleRegistrationSuccessMessage" class="alert alert-success" style="display:none;">
          Vehicle Added successfully
        </div>

        {{-- form for adding a vehicle --}}
        <form id="createVehicleForm">
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Vehicle Number</label>
              <input type="text" class="form-control" name="vehicleNumber" placeholder="Enter Vehicle Number">
            </div>
            <div class="form-group">
              <label>Route</label>
              <select class="select2"  name="VehicleRoute" data-placeholder="Select a Role" style="width: 100%;">
                <option>Nairobi-Nakuru</option>
                <option>Nairobi-Mombasa</option>
                <option>Nairobi-Eldoret</option>
                <option>Kisumu-Nairobi</option>
              </select>
            </div>
            <div class="form-group">
              <label>Status</label>
              <select class="select2" name="vehicleStatus" style="width: 100%;">
                <option>Full</option>
                <option>Empty/Nearly Full</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Amount</label>
              <input type="number" class="form-control" name="vehicleTravelAmount" placeholder="Amount">
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button id="submit_vehicle_data" type="submit" class="btn btn-success btn-large save-data" style="width:100%; font-weight:bold; font-size:20px; margin-top:-30px;">Submit</button>
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


<!-- Edit Vehicle modal -->
<div class="modal fade" id="modal-edit-vehicle">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title ml-3">Edit Vehicle</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        {{-- display error if any --}}
        <div id="editvehicleRegistrationErrors" class="alert alert-danger" style="display:none;">
          <ul class="list-group">
            <li id = "editvehicleNumberError" class="list-group-item text-danger"></li>
            <li id = "edittravelAmountError" class="list-group-item text-danger"></li>
          </ul>
        </div>

        {{-- display success message --}}
        <div id="editvehicleRegistrationSuccessMessage" class="alert alert-success" style="display:none;">
          Vehicle edited successfully
        </div>

        {{-- form for adding a vehicle --}}
        <form id="editcreateVehicleForm">
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Vehicle Number</label>
              <input type="text" class="form-control" name="editvehicleNumber" placeholder="Enter Vehicle Number">
            </div>
            <div class="form-group">
              <label>Route</label>
              <select class="select2"  name="editVehicleRoute" data-placeholder="Select a Role" style="width: 100%;">
                <option>Nairobi-Nakuru</option>
                <option>Nairobi-Mombasa</option>
                <option>Nairobi-Eldoret</option>
                <option>Kisumu-Nairobi</option>
              </select>
            </div>
            <div class="form-group">
              <label>Status</label>
              <select class="select2" name="editvehicleStatus" style="width: 100%;">
                <option>Full</option>
                <option>Empty</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Amount</label>
              <input type="number" class="form-control" name="editvehicleTravelAmount" placeholder="Amount">
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <input type="text" name="editvehicleId" style="visibility:hidden">
            <button id="submit_vehicle_data" type="submit" class="btn btn-success btn-large save-edit-data" style="width:100%; font-weight:bold; font-size:20px; margin-top:-30px;">Submit</button>
          </div>
        </form>
      </div>
      <div class="modal-footer justify-content-right mr-3">
        <button  type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<!-- shedule a Vehicle -->
<div class="modal fade" id="modal-shedule-vehicle">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title ml-3">Shedule Vehicle</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        {{-- display error if any --}}
        <div id="sheduleVehicleErrors" class="alert alert-danger" style="display:none;">
          <ul class="list-group">
            <li id = "scheduleError" class="list-group-item text-danger"></li>
          </ul>
        </div>

        {{-- display success message --}}
        <div id="sheduleVehicleSuccessMessage" class="alert alert-success" style="display:none;">
          Vehicle sheduled successfully
        </div>

        <form id="sheduleVehicleForm">
          <div class="card-body">

            <input type="number" name="sheduleVehicleId" style="visibility:hidden">
            <!-- Date and time -->
            <div class="form-group">
              <label>Date and time:</label>
                <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                    <input type="text" name="datetime" class="form-control datetimepicker-input" data-target="#reservationdatetime"/>
                    <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" onClick="sheduleVehicle()" class="btn btn-success btn-large" style="width:100%; font-weight:bold; font-size:20px; margin-top:-30px;">Shedule</button>
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


<!-- Reshedule a Vehicle -->
<div class="modal fade" id="modal-reshedule-vehicle">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title ml-3">ReShedule Vehicle</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        {{-- display error if any --}}
        <div id="resheduleVehicleErrors" class="alert alert-danger" style="display:none;">
          <ul class="list-group">
            <li id = "rescheduleError" class="list-group-item text-danger"></li>
          </ul>
        </div>

        {{-- display success message --}}
        <div id="resheduleVehicleSuccessMessage" class="alert alert-success" style="display:none;">
          Vehicle Resheduled successfully
        </div>

        <form id="resheduleVehicleForm">
          <div class="card-body">

            <input type="number" name="resheduleVehicleId" style="visibility:hidden">
            <!-- Date and time -->
            <div class="form-group">
              <label>Date and time:</label>
                <div class="input-group date" id="reservationdatetime2" data-target-input="nearest">
                    <input type="text" name="redatetime" class="form-control datetimepicker-input" data-target="#reservationdatetime2"/>
                    <div class="input-group-append" data-target="#reservationdatetime2" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" onClick="resheduleVehicle()" class="btn btn-success btn-large" style="width:100%; font-weight:bold; font-size:20px; margin-top:-30px;">Reshedule</button>
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