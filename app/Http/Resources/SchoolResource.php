<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SchoolResource extends JsonResource
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
            "logo" => $this->logo,
            "name" => $this->name,
            "address" => $this->address,
            "city" => $this->city,
            "region" => $this->region,
            "country" => $this->country,
            "lat" => $this->lat,
            "lng" => $this->lng,
        ];
    }
}
