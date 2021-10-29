<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable = ['fname', 'lname'];

    public function weighInLogs()
    {
        return $this->hasMany(WeighInLog::class);
    }
}
