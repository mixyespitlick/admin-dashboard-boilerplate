<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WeighInLog extends Model
{
    protected $table = 'weighin_logs';
    protected $fillable = ['gross_weight', 'driver_name', 'vehicle_id', 'service_provider_id', 'collection_point_id', 'or_no',  'net_weight', 'created_by', 'updated_by'];

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
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
