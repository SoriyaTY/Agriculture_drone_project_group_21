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
        "seeding"
    ];

    public function drones(){
        return $this->belongsToMany(Drone::class, 'drone_planes')->withTimestamps();
    }

    public static function store($request, $id = null)
    {
        $plan = $request->only(['name', 'seeding']);
        $plan = self::updateOrCreate(['id' => $id], $plan);
        return $plan;
    }
}
