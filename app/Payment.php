<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['tipping_fee_id', 'or_no', 'amount_paid', 'balance'];

    public function tipping_fee()
    {
        return $this->belongsTo(TippingFee::class, 'tipping_fee_id', 'id');
    }
}
