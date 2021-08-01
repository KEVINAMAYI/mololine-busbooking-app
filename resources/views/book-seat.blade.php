@extends('layouts.app',['backgroundcolor' => 'rgb(241,245,246)'])

@section('content')

<div class="container text-center" style="background-color:rgb(241,245,246)">   
    <div class="row text-center justify-content-center pt-5 pb-4">
        <div class="col-lg-5">
            <div class="feature-car-rent-box-1">
                  <form class="text-left" method="POST" action="/confirm-booking">
                    @csrf
                      <div class="form-group">
                          <label style="font-weight:bold;">Vehicle Route</label>
                          <select class="form-select select2 pl-1" name="vehicle_route" data-placeholder="Select a Role" style="width: 100%; height:50px;" readonly>
                            <option>{{ $vehicle[0]->vehicle_route }}</option>
                           
                          </select>
                        </div>
                      <div class="form-group">
                          <label style="font-weight:bold;">Vehicle Number</label>
                          <input type="text" name="vehicle_number" class="form-control" placeholder="Name" style="border:solid 1px grey" value="{{ $vehicle[0]->vehicle_numberplate }}" readonly>
                      </div>
                      <div class="form-group">
                          <label style="font-weight:bold;">Choose a seat (Available seats)</label>
                          <select name="seat" class="form-select select2 pl-1" data-placeholder="Select a Role" style="width: 100%; height:50px;">
                            @foreach ($available_seats as $available_seat)
                            <option>{{ $available_seat }}</option>
                            @endforeach 
                          </select>
                      </div>
                         
                      <div class="form-group">
                          <label for="exampleInputPassword1" style="font-weight:bold;">Amount Payable</label>
                          <input name="amount" type="number" class="form-control" id="exampleInputPassword1" placeholder="Amount" style="border:solid 1px grey;" value="{{ $vehicle[0]->vehicle_travel_amount }}" readonly>
                      </div> 
                      <div class="form-group">
                        <label for="exampleInputPassword1" style="font-weight:bold;">Depature Date and Time</label>
                          <input name="time" type="text" class="form-control" id="exampleInputPassword1" placeholder="Departure Date and Time" style="border:solid 1px grey;" value="{{ date("h:i:s a jS F, Y", strtotime(App\Models\VehicleShedule::where('vehicle_id',$vehicle[0]->id)->get('departuretime')->pluck('departuretime')->last())) }}" readonly>
                     </div>
                      <div class="form-group">
                          <button type="submit" class="btn btn-success btn-large" style="width:100%; color:white; font-weight:bold; font-size:20px; margin-top:10px;">Continue</button>
                      </div>                      
                  </form>                
            </div>
          </div>

    </div>
</div>

@endsection