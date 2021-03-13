<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            "name" => $this->name,
            "email" => $this->email,
            "profile" => new ProfileResource($this->profile),
            // "school" => new SchoolResource($this->profile->school),
            // "hostel" => new HostelResource($this->profile->hostel),
            // "phone" => $this->profile->phone,
            // "address" => $this->profile->address,
            // "level" => $this->profile->level,
            // "room" => $this->profile->room,
            // "city" => $this->profile->city,
            // "region" => $this->profile->region,
            // "country" => $this->profile->country,
            // "lat" => $this->profile->lat,
            // "lng" => $this->profile->lng,
        ];
    }
}
