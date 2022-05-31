<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function favourites(){
        return $this->hasMany(Favourite::class);
    }
    public function carts(){
        return $this->hasMany(Cart::class);
    }
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
    public function orders(){
        return $this->belongsToMany(Order::class);
    }
    public function product_category(){
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }
}
