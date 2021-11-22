<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WeighInLog extends Model
{
    protected $table = 'weighin_logs';
    protected $fillable = ['driver_id', 'vehicle_id', 'service_provider_id', 'user_id', 'or_no', 'gross_weight', 'net_weight'];

    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_id', 'id');
    }

    public function serviceProvider()
    {
        return $this->belongsTo(ServiceProvider::class, 'service_provider_id', 'id');
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
