<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the district's regency.
     */
    public function regency()
    {
        return $this->belongsTo(Regency::class);
    }

    /**
     * Get the district's segments.
     */
    public function villages()
    {
        return $this->HasMany(Village::class);
    }

    /**
     * Scope province to only their allowed province/s.
     */
    // public function scopeAllowed($query)
    // {
    //     $user = Auth::user();
    //     switch ($user->role_id) {
    //         case Role::PROVINCE_ADMIN:
    //             $provinceId = Str::substr($user->work_unit_regency_id, 0, 2);
    //             return $query->where('id', 'LIKE', "$provinceId%");
    //         case Role::REGENCY_ADMIN:
    //             $regencyIds = $user->regencies()->withoutGlobalScopes()->pluck('regencies.id')->unique();
    //             return $query->where(function ($query) use ($regencyIds) {
    //                 foreach ($regencyIds as $regencyId) {
    //                     $query->orWhere('id', 'LIKE', "$regencyId%");
    //                 }
    //             });
    //         default:
    //             return $query;
    //     }
    // }


    /**
     * Get regency id + name.
     */
    public function getIdAndNameAttribute()
    {
        return substr($this->id, -3) . " - $this->name";
    }
}
