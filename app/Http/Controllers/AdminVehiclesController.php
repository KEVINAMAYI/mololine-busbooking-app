<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vehicle;
use App\Models\VehicleSeat;
use App\Models\SeatBooking;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\VehicleShedule;


class AdminVehiclesController extends Controller
{

    //display vehicles
    public function getVehicles()
    {
        $vehicles = Vehicle::all();
        return view('admin.vehicles.list_vehicles')->with('vehicles',$vehicles);
    }


    //display vehicles for bookings
    public function getBookingsVehicles()
    {
        $not_full_vehicles = Vehicle::where([
                                            ['vehicle_status','=','Not-full'],
                                            ['sheduled','=',true]
                                            ])
                                    ->get();
        return view('admin.bookings.book_seat')->with('vehicles',$not_full_vehicles);
    }
    
    //create vehicle
    public function createVehicle(Request $request)
    { 

        //validate vehicle data
        $request->validate([
            'vehiclenumber' => 'required|string|min:0|max:255',
            'vehicleroute' => 'required|string|min:0|max:255',
            'vehiclestatus' => 'required|string|min:0|max:255',
            'travelamount' => 'required|int'
        ]);

        //get all request data
        $data = $request->all();

        // store data in db
        Vehicle::create([
            
            'vehicle_numberplate' => $data['vehiclenumber'],
            'vehicle_route' => $data['vehicleroute'],
            'vehicle_status' => $data['vehiclestatus'],
            'vehicle_travel_amount' => $data['travelamount'],
            'sheduled' => false

        ]);
        
        //return json response upon success
        return response()->json([
            'success' => 'Vehicle created successfully',
        ]);

    }

     //update vehicle
     public function updateVehicle(Request $request,Vehicle $vehicle)
     { 
 
         //validate vehicle data
         $request->validate([
             'vehiclenumber' => 'required|string|min:0|max:255',
             'vehicleroute' => 'required|string|min:0|max:255',
             'vehiclestatus' => 'required|string|min:0|max:255',
             'travelamount' => 'required|int'
         ]);
 
         //get all request data
         $data = $request->all();
         
         //update vehicle on db and save
         $vehicle->vehicle_numberplate = $data['vehiclenumber'];
         $vehicle->vehicle_route = $data['vehicleroute'];
         $vehicle->vehicle_status = $data['vehiclestatus'];
         $vehicle->vehicle_travel_amount = $data['travelamount'];
         $vehicle->save();
       
         
         //return json response upon success
         return response()->json([
             'success' => 'Vehicle updated successfully',
         ]);
 
     }


    //delete vehicles
    public function deleteVehicle(Vehicle $vehicle)
    {
        $vehicle->delete();
        
        session()->flash('success','Vehicle deleted successfully');
        return redirect('/admin/vehicles');
    }


    //display edit vehicle form
    public function showVehicleEditForm($vehicleid)
    {
        
        $vehicle = Vehicle::where('id',$vehicleid)->get();
        $vehiclejson = $vehicle->toArray();
        return response()->json([
            'data' => $vehiclejson,
        ]);
    }

    //shedule vehicle
    public function sheduleVehicle(Request $request)
    {   

        //validate
        $request->validate([
            'vehicleshedule' => 'required'
        ]);

        //get all data
        $data = $request->all();


        //convert time to timestamp
        $sheduledate = date('Y-m-d H:i:s',strtotime($data['vehicleshedule']));


        //store in database
        VehicleShedule::create([
            'vehicle_id' => $data['vehicleid'],
            'departuretime' => $sheduledate

        ]);
        
        //update status of vehicles
        Vehicle::where('id',$data['vehicleid'])->update([
            'sheduled' => true
        ]);

        return response()->json([
            'success' => 'Vehicle sheduled successfully',
        ]);

    }

    //reschedule vehicle
    public function rescheduleVehicle(Request $request)
    {   
      
        //validate
        $request->validate([
            'vehicleshedule' => 'required'
        ]);

        //get all data
        $data = $request->all();

        //convert time to timestamp
        $sheduledate = date('Y-m-d H:i:s',strtotime($data['vehicleshedule']));

        //update vehicle shedule and save
        $vehicleShedule = VehicleShedule::where(
            'vehicle_id',$data['vehicleid'])
            ->update([
            'departuretime' => $sheduledate 
              ]);

         //return json response upon success
         return response()->json([
            'success' => 'Vehicle rescheduled successfully',
            
        ]);

        
    }


    //book seat
    public function bookSeat(Request $request)
    {

        //validate data
        $request->validate(
            [
                'customername' => 'required|string',
                'seatnumber' => 'required|integer'
            ]);
            
            //get all data
            $data = $request->all();

            //get user_id, vehicle_id and seat_id
            $user_id = User::where('name', $data['customername'])->get()[0]->id;
            $seat_id = VehicleSeat::where('vehicle_seat_number',$data['seatnumber'])->get()[0]->id;
            $vehicle_id = $data['vehicleid'];

            //store data in database
            SeatBooking::create([
                'user_id' => $user_id,
                'vehicle_id' => $vehicle_id,
                'seat_id' => $seat_id
            ]);

        return response()->json([
            'success'=> 'seat successfully boooked'
        ]);

    }


    // display bookings
    public function displayBookings()
    {
       
        $bookings = SeatBooking::all();
        return view('admin.bookings.list_bookings')->with('bookings',$bookings);


    }

    //delete booking
    public function deleteBooking(SeatBooking $seat_booking)
    {
        //delete booking
        $seat_booking->delete();

        //flash success message and redirect user
        session()->flash('success','Seat Booking deleted successfully');
        return redirect('/admin/bookings');

    }

    //edit booking
    public function editBooking(Request $request)
    {

        //validate data
        $request->validate(
            [
                'customername' => 'required|string',
                'seatnumber' => 'required|integer',
                'vehiclenumber' => 'required|string'
            ]);
            
            
        //get all data
        $data = $request->all();

         //get user_id, vehicle_id and seat_id
         $user_id = User::where('name', $data['customername'])->get()[0]->id;
         $vehicle_id = Vehicle::where('vehicle_numberplate', $data['vehiclenumber'])->get()[0]->id;
         $seat_id = VehicleSeat::where('vehicle_seat_number',$data['seatnumber'])->get()[0]->id;

        //update booking 
        $SeatBooking = SeatBooking::where(
            'id',$data['bookingid'])
            ->update([
            'user_id' => $user_id,
            'vehicle_id' => $vehicle_id,
            'seat_id' => $seat_id
              ]);


        return response()->json([
            'success' => 'booking successfully edited'
        ]);


    }


    //get Availables seats
    public function getAvailableSeats($vehicleid)
    {

        //get all booking records
        $bookings = SeatBooking::where('vehicle_id',$vehicleid)->get();

        //set booked seat to an empty array
        $bookedseats = array(); 
       
        //set number of all seats to empty array
        $allseats = array();
        
        //get ids for booked seats
        foreach ($bookings as $booking)
        {
            array_push($bookedseats,$booking->seat_id);
        }

        //get all seats
        for($i = 0; $i < 14 ; $i++)
        {

            array_push($allseats,VehicleSeat::all()[$i]->id);
        }

         //unbooked seats
         $unbookedseats = array_diff($allseats,$bookedseats);
        
         return response()->json([
             'unbooked_seats' => $unbookedseats
         ]);
    }

}
