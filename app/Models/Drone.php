<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Drone extends Model
{
    use HasFactory;
    protected $fillable = [
        "amount_Time",
        "speed",
        "battery",
        "user_id",
        "droneType_id"
    ];

    public function type(){
        return $this->belongsTo(DroneType::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public static function drone($request, $id = null)
    {
        $drone = $request->only(['amount_Time', 'speed', 'battery', 'user_id', 'droneType_id']);
        $drone = self::updateOrCreate(['id'=> $id], $drone);
        return $drone;
    }

}