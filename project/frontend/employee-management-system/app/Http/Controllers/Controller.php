<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

abstract class Controller
{
    protected $userSession;

    protected $checkUserSession;

    public function __construct() {

        $this->userSession = Session::get('user_id');

        $this->checkUserSession = Session::has('user_id');

    }

}
