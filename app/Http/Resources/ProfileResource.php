<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
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
            "school" => new SchoolResource($this->school),
            "hostel" => new HostelResource($this->hostel),
            "phone" => $this->phone,
            "address" => $this->address,
            "level" => $this->level,
            "room" => $this->room,
            "city" => $this->city,
            "region" => $this->region,
            "country" => $this->country,
            "lat" => $this->lat,
            "lng" => $this->lng,
        ];
    }
}
