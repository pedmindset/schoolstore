<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AccountResource extends JsonResource
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
            // "name" => $this->name,
            "balance" => $this->balance,
            "credit" => $this->credit,
            "limit" => $this->limit,
            "user" => new UserResource($this->user),
        ];
    }
}
