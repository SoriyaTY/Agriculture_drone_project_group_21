<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TypeOfDrone extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    // drone and type of drone 
    public function drone():HasOne{
        return $this->hasOne(Drone::class);
    }

    public static function type($request, $id = null){
        $type = $request->only(['name']);
        $type = self::updateOrCreate(['id'=>$id], $type);
        return $type;
    }
}