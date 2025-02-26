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

            exit();

        }

        return redirect()->route("users.index");

    }

    public function logout() {

        if($this->checkUserSession) {

            Session::flush();

            return view("login");

        }

    }

    public function handle($action, Request $request) {

        if($action == "store") {

            $name = $request->name;

            $email = $request->email;

            $password = $request->password;

            $city = $request->city;

            $jobTitle = $request->job_title;

            $salary = $request->salary;

            $request->validate([

                "name" => ["required", "string", "max:255"],

                "email" => ["required", "string", "max:255", "unique:users,email"],

                "password" => ["required", "string", "min:8"],

                "city" => ["required", "string", "max:255"],

                "job_title" => ["required", "string", "max:255"],

                "salary" => ["required", "int","min:1000"],

            ]);

            User::create([

                "name" => $name,

                "email" => $email,

                "password" => $password,

                "city" => $city,

                "job_title" => $jobTitle,

                "salary" => $salary,

            ]);

            return to_route(route: "users.index");

        } elseif($action == "signin") {

            if(!$this->checkUserSession) {

                $validator =  $request->validate([

                    "email" => "required",

                    "password" => "required",

                ]);


                $user = User::where("email", $request->email)->where("role", 0)->first();

                if($user && Hash::check($request->password, $user->password)) {

                    Session::put("user_id", $user->id);

                    Session::put("name", $user->name);

                    return redirect()->route("users.index");

                } else {

                    return redirect()->back()->withInput()->withErrors(["The email or password is incorrect !"]);

                }

            } else {

                return view("./errors/404");

            }

        } else {

            return view("./errors/404");

        }

    }

    public function index() {

        if(!$this->checkUserSession) {

            return view("./errors/404");

        }

        $users = User::where("role", 1)->get();

        return view("index", ["users" => $users]);


    }

    public function create() {

        if(!$this->checkUserSession) {

            return view("./errors/404");

        }

        return view("create");

    }

    public function edit($id) {

        if(!$this->checkUserSession) {

            return view("./errors/404");

        }

        $user = User::findOrFail($id);

        return view("edit", ["user" => $user]);


    }

    public function update(Request $request, $id) {

        if(!$this->checkUserSession) {

            return view("./errors/404");

        }

        $name = $request->name;

        $email = $request->email;

        $city = $request->city;

        $jobTitle = $request->job_title;

        $salary = $request->salary;

        $request->validate([

            "name" => ["required", "string", "max:255"],

            "email" => ["required", "string", "max:255"],

            "password" => ["nullable", "string", "min:8"],

            "city" => ["required", "string", "max:255"],

            "job_title" => ["required", "string", "max:255"],

            "salary" => ["required", "int","min:1000"],

        ]);

        $updateUser = User::find($id);

        if ($request->filled('password')) {

            $updateUser->password = Hash::make($request->password);

        }

        $updateUser->update([

            "name" => $name,

            "email" => $email,

            "city" => $city,

            "job_title" => $jobTitle,

            "salary" => $salary,

        ]);

        return to_route(route: "users.index");

    }

    public function destroy(User $id) {

        if(!$this->checkUserSession) {

            return view("./errors/404");

        }

        $id->delete();

        return to_route("users.index");

    }

}
