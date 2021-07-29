<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeatBooking extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'vehicle_id',
        'seat_id'
        ];


    //define table to be used by SeatBooking model
    protected $table = "seats_bookings";


     //return the booking that belongs to a vehicle => specific seat
     public function vehicle()
     {
         
         return $this->belongsTo(Vehicle::class);
         
     }

     //return the shedule that belongs to a user
     public function user()
     {
         
         return $this->belongsTo(User::class);
         
     }


    //return the seat that belongs to a vehicle
    public function seat()
    {
        
        return $this->belongsTo(VehicleSeat::class);
        
    }


}
