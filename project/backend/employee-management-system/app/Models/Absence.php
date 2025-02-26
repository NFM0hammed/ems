<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{

    public $timestamps = false;

    public function user() {

        return $this->belongsTo(User::class);

    }

    protected $fillable = [

        "absence",

        "absence_date",

        "user_id",

    ];

}
