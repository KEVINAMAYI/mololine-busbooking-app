@extends('layouts.app',['backgroundcolor' => 'rgb(255,255,255)'])

@section('content')

<div class="container mt-3 mb-4">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default text-center table-responsive">
                <div class=" card-header"></div>
                <div class="card-body">
                      <table class="table table-striped no-cellpadding" >
                        <thead>
                          <tr class="p-0">
                            <th class="p-0">Vehicle</th>
                            <th  class="p-0">Route</th>
                            <th  class="p-0">Seat Number</th>
                            <th  class="p-0">Action</th>
                                                       
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($bookings as $booking)
                            
                          <tr>
                            <th  class="pl-0 pr-0">{{ $booking->vehicle->vehicle_numberplate }}</th>
                            <td  class="pl-2 pr-0">{{ $booking->vehicle->vehicle_route }}</td>
                            <td  class="pl-0 pr-0">{{ $booking->seat->vehicle_seat_number }}</td>
                            <td class="pl-1 pr-0">
                              <a onClick="displayBookingDetails({{ $booking->id }})" class="btn btn-xs btn-success rounded-pill" style="font-weight:bold; color:white;"> Full Details</a>
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

    <!-- view booking details modal -->
<div class="modal fade" id="modal-view-booking-details">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title ml-3"></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="card card-default">
                <div class="card-header">
                    <h3>Booking Details</h3>
                </div>
                <div class="card-body text-left">
                   <h5 style="font-weight:bold; color:green;">Customer Info</h5>
                   <div><span>Customer Name : </span><span id="booking-username"></span></div>
                   <div><span>Customer Phone Number : </span><span id="booking-phonenumber"> </span></div>
                   <hr style="width:100%">
                   <h5 style="font-weight:bold; color:green;">Trave Info</h5>
                   <div><span>Vehicle Number : </span><span id="booking-vehicle-number"></span></div>
                   <div><span>Seat Number : </span><span id="booking-seat-number"></span></div>
                   <div><span>From  : </span><span id="booking-from"> Nairobi</span></div>
                   <div><span>To : </span><span id="booking-to"></span></div>
                   <div><span>Travel Time : </span><span id="booking-time"></span></div>
                   {{-- <div><span>Pickup Station : </span><span> Afya Center </span></div>
                   <div><span>Alight Station : </span><span> Thika </span></div> --}}
                   <hr style="width:100%">
                   <h5 style="font-weight:bold; color:green;">Amount Paid<span id="booking-amount" class="float-right"></span> </h5>
                </div>
            </div> 
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