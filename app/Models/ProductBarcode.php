<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductBarcode extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'barcode'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
