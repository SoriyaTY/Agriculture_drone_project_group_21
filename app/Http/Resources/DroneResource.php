<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DroneResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"=>$this->id,
            "drone_id"=>$this->drone_id,
            "amount_Time"=>$this->amount_Time,
            "speed"=>$this->speed,
            "battery"=>$this->battery,
            "type"=>$this->type,
            "instruction"=>$this->instruction,
            "map"=>new MapResource($this->map),
            "users"=>new UserResource($this->user),
            "plans"=>PlanResource::collection($this->plans)
        ];
    }
}
