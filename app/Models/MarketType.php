<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MarketType extends Model
{
    protected $fillable = ['name'];

    public function markets() {
        return $this->hasMany(Market::class);
    }
}
