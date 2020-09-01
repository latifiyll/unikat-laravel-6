<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'category' => new Category($this->category),
            'type' => new Type($this->type),
            'quantity' => $this->quantity,
            'price' => $this->price,
            'image' => $this->getFirstMediaUrl('product_image'),
            'thumb_image' => $this->getFirstMediaUrl('product_image','thumb'),
            'images' => $this->getMedia('product_variants')->map(function ($item) {
                return $item->getUrl();
            }),
        ];
    }
}
