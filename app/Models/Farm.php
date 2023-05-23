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
        'location_id'
    ];

    // location and farm
    public function farm():BelongsTo
    {
        return $this->belongsTo(Location::class);
    }
}
