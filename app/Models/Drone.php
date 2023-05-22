<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Drone extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'size',
        'amounTime',
        'speed',
        'battery', 
        'drone_id'
    ];

    public function type():BelongsTo{
        return $this->belongsTo('type_of_drones'::class);
    }

    public static function drone($request, $id=null){
        $drones = $request->only(['name', 'size', 'amounTime', 'speed', 'battery', 'drone_id']);
        $drones = self::updateOrCreate(['id'=>$id], $drones);
        return $drones;
    }
}

