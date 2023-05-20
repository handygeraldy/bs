<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    const SUPER_ADMIN       = 0;
    const CENTER_ADMIN      = 1;
    const PROVINCE_ADMIN    = 2;
    const REGENCY_ADMIN     = 3;
}
