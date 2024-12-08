<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_code', 
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

    public function markets()
    {
        return $this->belongsToMany(Market::class, 'market_product');
    }

    public function barcodes()
    {
        return $this->hasMany(ProductBarcode::class);
    }

    public function calculateAveragePrice()
    {
        $totalPrice = $this->markets->sum('price'); // Asumiendo que cada market tiene un precio para el producto
        $count = $this->markets->count();

        return $count > 0 ? $totalPrice / $count : 0;
    }
}
