<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function dronetypes():BelongsTo{
        return $this->belongsTo(DroneType::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}