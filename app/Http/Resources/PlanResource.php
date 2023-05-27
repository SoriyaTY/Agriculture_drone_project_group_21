<?php

namespace App\Http\Resources;

use App\Models\Drone;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlanResource extends JsonResource
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
            "seeding"=>$this->seeding,
            "name"=>$this->name,
            "instruction"=>new InstructionResource($this->instruction)
        ];
    }
}