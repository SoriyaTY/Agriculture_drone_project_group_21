<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drone extends Model
{
    use HasFactory;
    protected $fillable = [
        "drone_id",
        "amount_Time",
        "speed",
        "battery",
        "type",
        "map_id",
        "instruction",
        "user_id"
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function plans(){
        return $this->belongsToMany(Plan::class,'drone_planes')->withTimestamps();
    }

    public function map(){
        return $this->belongsTo(Map::class);
    }

    public static function store($request,$id=null){
        $drone = $request->only(['drone_id','amount_Time','speed','battery','user_id','map_id','type','instruction']);
        $drone = self::updateOrCreate(['id'=>$id],$drone);

        $dronePlan = request('plans');
        $drone->plans()->sync($dronePlan);
        return $drone;
    } 

}