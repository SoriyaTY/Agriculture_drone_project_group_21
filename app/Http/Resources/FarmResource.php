<?php

namespace App\Http\Resources;

use App\Models\Farm;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class FarmResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request, $id = null): array
    {
        return [
            'id'=>$this->id,
            'name'      =>$this->name,
            'address'   =>$this->address,
            'location'  =>new LocationResource($this->location)
        ];
    }
}
