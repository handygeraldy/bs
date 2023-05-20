<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    const REGENCY_PROCESSING   = 1;
    const PROVINCE_REFUSAL     = 2;
    const PROVINCE_APPROVAL    = 3;
    const RELEASED             = 4;
}
