<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class RoleUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'role'
    ];

    // user and role
    public function user():HasOne{
        return $this->hasOne(User::class);
    }

    public static function roleUser($request, $id = null)
    {
        $role = $request->only(['role']);
        $role = self::updateOrCreate(['id'=>$id], $role);
        return $role;
    }
}
