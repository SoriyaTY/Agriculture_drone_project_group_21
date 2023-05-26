<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MapResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // dd(1);
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            "image"=>$this->image,
            'location'=>new LocationResource($this->location),
            'farm'=>new FarmResource($this->farm)
        ];
    }
}
