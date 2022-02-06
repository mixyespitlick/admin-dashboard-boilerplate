<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TippingFee extends Model
{
    protected $fillable = ['weighin_log_id', 'control_no', 'amount_payable'];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function weighInLog()
    {
        return $this->belongsTo(WeighInLog::class, 'weighin_log_id', 'id');
    }
}
