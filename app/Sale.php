<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $guarded = [];

    public function buyer()
    {
        return $this->hasMany(Buyer::class);
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
