<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    // تعطيل حقول update و Created
    public $timestamps = false;

    protected $fillable = [
        'check_in',
        'delay',
        'user_id',
    ];
}
