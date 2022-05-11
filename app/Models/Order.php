<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid_key', //BE
        'customer_id',//BE
        'status', //BE
        'driver_id', //BE
        'market_id',
        'address',
        'product_voucher_id',
        'product_discount',
        'shipping_voucher_id',
        'shipping_discount',
        'total_price',
        'payment_type',
        'paid',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function orderProducts(){
        return $this->hasMany(OrderProduct::class);
    }

    public function driver(){
        return $this->belongsTo(User::class, 'driver_id', 'id');
    }

    public function customer(){
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }
}
