<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CollectionPoint extends Model
{
    protected $fillable = ['name', 'description', 'area_id'];

    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id', 'id');
    }

    public function weighInLogs()
    {
        return $this->hasMany(WeighInLog::class);
    }
}
