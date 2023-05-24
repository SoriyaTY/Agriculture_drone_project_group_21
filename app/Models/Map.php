<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Map extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'location_id'
    ];

    // location and map
    public function location():BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    // Map 
    public static function maps($request , $id = null)
    {
        $map = $request->only(['name', 'image','location_id']);
        $map = self::updateOrCreate(['id'=>$id], $map);
        return $map;
    }
}
