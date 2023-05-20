<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Regency extends Model
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
            $builder->where('regencies.id', 'NOT LIKE', '%00');
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
    //             $provinceId = Str::substr($user->work_unit_regency_id, 0, 2);
    //             return $query->where('id', 'LIKE', "$provinceId%");
    //         case Role::REGENCY_ADMIN:
    //             $regencyIds = $user->regencies()->pluck('regencies.id')->unique();
    //             return $query->whereIn('id', $regencyIds);
    //         default:
    //             return $query;
    //     }
    // }

    /**
     * Get the regency's districts.
     */
    public function districts()
    {
        return $this->hasMany(District::class);
    }

    /**
     * Get the regency's provinces.
     */
    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    /**
     * Get users in current regency.
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }


    /**
     * Get regency id + name.
     */
    public function getIdAndNameAttribute()
    {
        return substr($this->id, -2) . " - $this->name";
    }

    /**
     * Get work unit id + name.
     */
    public function getWorkUnitAndNameAttribute()
    {
        return $this->id . " - $this->name";
    }

    /**
     * Get user + office emails.
     */
    // public function getEmailsAttribute()
    // {
    //     $userEmails = $this->users->pluck('email');
    //     $officeEmails = Email::where('bps_id', $this->id)->pluck('address');
    //     return collect($userEmails)->merge($officeEmails)->unique()->all();
    // }
}
