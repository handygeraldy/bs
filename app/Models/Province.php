<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Province extends Model
{
    use HasFactory;

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope('area', function (Builder $builder) {
            $builder->where('provinces.id', '!=', '00');
        });
    }

    /**
     * Scope province to only their allowed province/s.
     */
    // public function scopeAllowed($query)
    // {
    //     $user = Auth::user();
    //     switch ($user->role_id) {
    //         case Role::PROVINCE_ADMIN:
    //         case Role::REGENCY_ADMIN:
    //             $provinceIds = $user->regencies()->withoutGlobalScopes()->pluck('regencies.id')->map(function ($item) {
    //                 return Str::substr($item, 0, 2);
    //             })->unique();
    //             return $query->whereIn('id', $provinceIds);
    //         default:
    //             return $query;
    //     }
    // }

    /**
     * Get the province's regencies.
     */
    public function regencies()
    {
        return $this->hasMany(Regency::class);
    }

    /**
     * Get province id + name.
     */
    public function getIdAndNameAttribute()
    {
        return "$this->id - $this->name";
    }
}
