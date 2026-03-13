<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status',
        'payment_status',
        'payment_method',
        'total_net',
        'total_vat',
        'total_gross',
        'currency'
    ];

    protected $casts = [
        'total_net' => 'decimal:2',
        'total_vat' => 'decimal:2',
        'total_gross' => 'decimal:2',
    ];

    /**
     * Zamówienie należy do użytkownika
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Produkty w zamówieniu
     */
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Adresy zamówienia
     */
    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
}
