<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DroneType extends Model
{
    use HasFactory;
    protected $fillable =[
        "type"
    ];
    
    public function drone():HasOne{
        return $this->hasOne(Drone::class);
    }
}
