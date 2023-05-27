<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Plan extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "seeding",
        "instruction_id"
    ];

    public function drones(){
        return $this->belongsToMany(Drone::class, 'drone_planes')->withTimestamps();
    }

    
    public function instruction(){
        return $this->belongsTo(Instruction::class);
    }

    
    public static function store($request, $id = null)
    {
        $plan = $request->only(['name', 'seeding','instruction_id']);
        $plan = self::updateOrCreate(['id' => $id], $plan);
        return $plan;
    }

}
