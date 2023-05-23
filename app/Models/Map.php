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
        'location_id'
    ];

    // location and map
    public function map():BelongsTo
    {
        return $this->belongsTo(Location::class);
    }
}
