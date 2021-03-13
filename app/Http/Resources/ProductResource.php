<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            "id" => $this->id,
            "cover_photo" => $this->cover_photo,
            "name" => $this->name,
            "slug" => $this->slug,
            "price" => $this->price,
            "quantity" => $this->quantity,
            "description" => $this->description,
            "category" => new ProductCategoryResource($this->productCategory),
        ];
    }
}
