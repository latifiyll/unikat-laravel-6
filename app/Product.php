<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $guarded =[];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function buyer()
    {
        return $this->belongsToMany(Buyer::class,'sales','buyer_id','product_id');
    }

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(100)
            ->height(100);
        $this->addMediaConversion('xsmall')
            ->width(200)
            ->height(200);
        $this->addMediaConversion('small')
            ->width(400)
            ->height(400);
        $this->addMediaConversion('medium')
            ->width(800)
            ->height(800);
        $this->addMediaConversion('large')
            ->width(1024)
            ->height(1024);
        $this->addMediaConversion('xlarge')
            ->width(2048)
            ->height(2048);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('product_image')->acceptsMimeTypes(['image/jpeg'])->singleFile();
        $this->addMediaCollection('product_variants')->acceptsMimeTypes(['image/jpeg']);
    }
}
