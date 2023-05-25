<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DroneLocationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "drone_id"=>$this->drone_id,
            "location" => [
                "latitude"  =>$this ->  map -> location -> latitude,
                "longitude" =>$this ->  map -> location -> longitude,
            ]
        ];
    }
}
