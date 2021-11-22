<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceProviderType extends Model
{
    protected $fillable = ['name', 'description'];

    public function serviceProviders()
    {
        return $this->hasMany(ServiceProvider::class);
    }
}
