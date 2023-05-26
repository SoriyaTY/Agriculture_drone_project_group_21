<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instruction extends Model
{
    use HasFactory;
    protected $fillable=[
        'description'
    ];

    public function drones(){
        return $this->hasMany(Drone::class);
    }
}
