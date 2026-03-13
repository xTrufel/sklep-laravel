<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'order_id',
        'type',
        'name',
        'company',
        'street',
        'city',
        'postal_code',
        'country'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}