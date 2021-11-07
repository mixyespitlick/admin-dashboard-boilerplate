<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = ['vehicle_type_id', 'plate_no', 'body_no', 'tare'];

    public function vehicleType()
    {
        return $this->belongsTo(VehicleType::class, 'vehicle_type_id', 'id');
    }

    public function weighInLogs()
    {
        return $this->hasMany(WeighInLog::class); 
    }
}
