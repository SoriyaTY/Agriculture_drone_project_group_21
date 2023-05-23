<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Location extends Model
{
    use HasFactory;
    protected $fillable = [
        'latitude',
        'longitude'
    ];

    // location and farm 
    public function farm():HasOne
    {
        return $this->hasOne(Farm::class);
    }
    // location and map
    public function map():HasOne
    {
        return $this->hasOne(Map::class);
    }

    // location
    public static function location($request , $id = null)
    {
        $location = $request->only(['latitude', 'longitude']);
        $location = self::updateOrCreate(['id'=>$id], $location);
        return $location;
    }

}
