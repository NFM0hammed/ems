<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departure extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'check_out',
        'early_check_out',
        'user_id',
    ];
}
