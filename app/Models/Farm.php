<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Farm extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'location_id',
    ];

    // location and farm
    public function location():BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    // Farm
    public static function farms($request, $id = null)
    {
        $farm = $request->only(['name', 'address', 'location_id']);
        $farm = self::updateOrCreate(['id'=>$id], $farm);
        return $farm;
    }
}
