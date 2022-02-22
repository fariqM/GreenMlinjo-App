<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['uuid_key', 'customer_id', 'status', 'driver_id', 'market_id', 'address', 'total_price', 'discount_voucher', 'shipping_voucher'];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function driver(){
        return $this->belongsTo(User::class, 'driver_id', 'id');
    }

    public function customer(){
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }
}
