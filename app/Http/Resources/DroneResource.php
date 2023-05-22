<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DroneResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *  '
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name'=>$this->name,
            'size'=>$this->size,
            'amount_time'=>$this->amountTime,
            'speed'=>$this->speed,
            'battery'=>$this->battery,
            'drone_type'=>$this->drone,
        ];
    }
}
