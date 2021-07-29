<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\SeatBooking;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminReportsController extends Controller
{
    public function reports()
    {
        
        /*
         * 1.Booking per route -> customers bookings /routes
         */
        $bookings = SeatBooking::all();
        $booking_record_routes = array();
        
        //store the booking routes in an array
        foreach($bookings as $booking)
        {
            array_push($booking_record_routes,$booking->vehicle->vehicle_route);
        }

        //count bookings per route
        $bookings_per_route = array_count_values($booking_record_routes); 
        
        

        /*
         * 2.Vehicles per route 
         * 
         */
        $routes_vehicles = Vehicle::all()->groupBy('vehicle_route');
        $vehicle_per_route = array();
       
        foreach($routes_vehicles as $route_vehicle => $vehicles)
        {
          
            $vehicle_per_route[$route_vehicle] = count($vehicles);  
        }



        /*
         * 3.Monthly Bookings -> Bookings per month
         * 
         */
        $booking_time = SeatBooking::all()->groupBy(function($d) {
            return Carbon::parse($d->created_at)->format('M');
        });

        $monthly_bookings = array();

        foreach($booking_time as $month => $mothly_bookings)
        {
          
            $monthly_bookings[$month] = count($mothly_bookings);  
        }




        /*
         * 4.monthly revenue -> total revenue earned per month
         * 
         */
         $booking_cash = array();
         $booking_time = array();
         $monthly_revenues = array();
         $monthly_revenues_compiled = array();

         //store the booking routes in an array
         foreach($bookings as $booking)
         {
           
             array_push($monthly_revenues,array($booking->created_at->format('M'),$booking->vehicle->vehicle_travel_amount));
            
         }

         //values to store totals
         $jan_total  = 0;
         $feb_total  = 0;
         $mar_total  = 0;
         $apr_total  = 0;
         $may_total  = 0;
         $june_total = 0;
         $july_total = 0;
         $aug_total  = 0;
         $sept_total = 0;
         $oct_total  = 0;
         $nov_total  = 0;
         $dec_total  = 0;

         foreach($monthly_revenues as $key => $value)
         {

            switch ($value[0]) {
                case "Jan":
                    $jan_total += $value[1];
                  break;
                case "Feb":
                    $feb_total += $value[1];
                  break;
                case "Mar":
                    $mar_total += $value[1];
                  break;
                case "Apr":
                    $apr_total += $value[1];
                  break;
                case "May":
                    $may_total += $value[1];
                  break;
                case "Jun":
                    $june_total += $value[1];
                  break;
                case "Jul":
                    $july_total += $value[1];
                  break;
                case "Aug":
                    $aug_total += $value[1];
                  break;
                case "Sep":
                    $sept_total += $value[1];
                  break;
                case "Oct":
                    $oct_total += $value[1];
                  break;
                case "Nov":
                    $nov_total += $value[1];
                  break;
                case "Dec":
                    $dec_total += $value[1];
                  break;
                default:
                  echo "monthly revenues";
              }


         }

         //store calculated revenues for months
         $monthly_revenues_compiled['Jan'] = $jan_total;
         $monthly_revenues_compiled['Feb'] = $feb_total;
         $monthly_revenues_compiled['Mar'] = $mar_total;
         $monthly_revenues_compiled['Apr'] = $apr_total;
         $monthly_revenues_compiled['May'] = $may_total;
         $monthly_revenues_compiled['Jun'] = $june_total;
         $monthly_revenues_compiled['Jul'] = $july_total;
         $monthly_revenues_compiled['Aug'] = $aug_total;
         $monthly_revenues_compiled['Sep'] = $sept_total;
         $monthly_revenues_compiled['Oct'] = $oct_total;
         $monthly_revenues_compiled['Nov'] = $nov_total;
         $monthly_revenues_compiled['Dec'] = $dec_total;

        
        //return all the summarized data 
        return response()->json([
            'bookings_per_route' => $bookings_per_route,
            'vehicle_per_route' =>  $vehicle_per_route,
            'monthly_bookings' => $monthly_bookings,
            'monthly_revenues' => $monthly_revenues_compiled
        ]);


    }
}
