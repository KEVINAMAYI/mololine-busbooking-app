<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleShedule extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'vehicle_id',
        'departuretime'   
    ];


    //return the shedule that belongs to a vehicle
    public function vehicle()
    {
        
        return $this->belongsTo(Vehicle::class);
        
    }

    //table to be use by this model
    protected $table = "shedule";

}
