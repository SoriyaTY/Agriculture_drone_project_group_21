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
        "drone_id",
        "amount_Time",
        "speed",
        "battery",
        "user_id",
        "type",
        "instruction"
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function plans(){
        return $this->belongsToMany(Plan::class,'drone_planes')->withTimestamps();
    }

    public static function store($request,$id=null){
        $drone = $request->only(['drone_id','amount_Time','speed','battery','user_id','type','instruction']);
        $drone = self::updateOrCreate(['id'=>$id],$drone);

        $dronePlan = request('plans');
        $drone->plans()->sync($dronePlan);
        return $drone;
    } 
}