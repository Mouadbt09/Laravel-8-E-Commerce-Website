<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'price', 'description', 'category', 's3_mths_2_yrs', 's3_5_yrs', 's6_9_yrs', 's10_16_yrs', 'img1', 'img2', 'img3', 'img4'];

    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'cart_products')->withPivot('quantity');    
    }
}
