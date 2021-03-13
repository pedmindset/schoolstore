<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DeliveryScheduleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            "id" => $this->id,
            "school" => new SchoolResource($this->school),
            "delivery_schedule_orders" => DeliveryScheduleOrderResource::collection($this->orders),
            "status" => $this->status,
            "delivery_date" => $this->delivery_date,
        ];
    }
}
