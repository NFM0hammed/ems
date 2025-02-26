<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function login() {

        if(!$this->checkUserSession) {

            return view("login");

        }

        return redirect()->route("user.index");

    }

    public function logout() {

        if($this->checkUserSession) {

            Session::flush();

            return to_route("user.login");

        }

    }

    public function index() {

        if(!$this->checkUserSession) {

            return view("./errors/404");

        }

        $user = User::where("id", $this->userSession)->first();

        return view("index", ["user" => $user]);

    }

    public function signin(Request $request) {


        $validator =  $request->validate([

            "email" => "required",

            "password" => "required",

        ]);


        $user = User::where("email", $request->email)->where("role", 1)->first();

        if($user && Hash::check($request->password, $user->password)) {

            Session::put("user_id", $user->id);

            Session::put("name", $user->name);

            return redirect()->route("user.index");

        } else {

            return redirect()->back()->withInput()->withErrors(["login_error" => "The email or password is incorrect !"]);

        }

    }

    public function edit() {

        if(!$this->checkUserSession) {

            return view("./errors/404");

        }

        $user = User::where("id", $this->userSession)->first();

        return view("Edit", ["user" => $user]);

    }

    public function update(Request $request) {

        $name = $request->name;

        $email = $request->email;

        $password = $request->password;

        $request->validate([

            "name" => ["required", "string", "max:255"],

            "email" => ["required", "string", "max:255"],

            "password" => ["required", "string", "min:8"],

        ]);

        $updateUser = User::find($this->checkUserSession);

        $updateUser->update([

            "name" => $name,

            "email" => $email,

            "password" => $password,

        ]);

        return to_route(route: "user.index");

    }

}
