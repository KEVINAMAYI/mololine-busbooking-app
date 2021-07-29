<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleSeat extends Model
{
    use HasFactory;

   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'vehicle_seat_number'
        ];

    //table to be use by this model
    protected $table = "vehicles_seats";

    //return the seat that belongs to a vehicle
    public function vehicle()
    {
        
        return $this->belongsTo(Vehicle::class);
        
    }

    //bookings associated with vehicle
    public function vehicleSeatBooking()
    {
        return $this->hasMany(SeatBooking::class);
    }


}
