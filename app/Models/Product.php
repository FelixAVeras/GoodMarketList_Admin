<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'barcode', 
        'name', 
        'unit', 
        'category_id', 
        'average_price', 
        'image_url', 
        'isAvailable',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // public function markets()
    // {
    //     return $this->belongsToMany(Market::class, 'market_product');
    // }

    public function markets()
    {
        return $this->belongsToMany(Market::class)->withPivot('price');
    }

    public function barcodes()
    {
        return $this->hasMany(ProductBarcode::class);
    }

    public function calculateAveragePrice()
    {
        return $this->markets()->withPivot('price')->get()->avg('pivot.price');
    }
}
