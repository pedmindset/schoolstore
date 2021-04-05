<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            "code" => $this->code,
            "uuid" => $this->uuid,
            "user" => new UserResource($this->user),
            "order_products" => OrderProductResource::collection($this->products),
            "amount" => $this->amount,
            "status" => $this->status,
            "lat" => $this->lat,
            "lng" => $this->lng,
            "created_at" => $this->created_at->toDateTimeString(),
        ];
    }
}
