<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'vehicle_numberplate',
        'vehicle_route',
        'vehicle_status',
        'vehicle_travel_amount',
        'sheduled'
        ];


        //shedule associated with vehicle
        public function vehicleShedule()
        {
            return $this->hasMany(VehicleShedule::class);
        }


        //seat associated with vehicle
        public function vehicleSeat()
        {
            return $this->hasMany(VehicleSeat::class);
        }


        //bookings associated with vehicle
        public function vehicleBooking()
        {
            return $this->hasMany(SeatBooking::class);
        }
}
