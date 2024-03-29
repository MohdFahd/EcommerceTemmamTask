<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function cart()
    {
        return $this->hasMany(cart::class);
    }

    public function productimg()
    {
        return $this->hasMany(Product_image::class);
    }

    public function buyingOffers()
    {
        return $this->hasMany(BuyingOffer::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function favorites()
    {
        return $this->hasMany(favorite::class);
    }




}
