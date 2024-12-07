<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
    protected $fillable = [
        'name',
        'city_id',
        'market_type_id',
    ];

    // public function city() {
    //     return $this->belongsTo(City::class);
    // }

    public function cities() {
        return $this->belongsToMany(City::class);
    }

    public function marketType() {
        return $this->belongsTo(MarketType::class);
    }
}
