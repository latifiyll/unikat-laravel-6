<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Category extends Model implements HasMedia
{
    use InteractsWithMedia;
    protected $guarded = [];


    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }
}
