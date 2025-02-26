<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    public $timestamps = false;

    protected $fillable = [
        "absence",
        "absence_date",
        "user_id",
    ];

}
