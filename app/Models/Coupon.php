<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = [
        'code',
        'type',
        'value',
        'min_cart_value',
        'usage_limit',
        'active',
        'start_at',
        'end_at'
    ];
}