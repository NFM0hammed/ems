<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\User;
use App\Models\Departure;
use App\Models\Attendance;

class DeparturesController extends Controller
{
    public function departures() {

        if(!$this->checkUserSession) {

            return view("./errors/404");

        }

        $departures = Departure::where("user_id", $this->userSession)->get();

        $count = Departure::where("user_id", $this->userSession)->where("early_check_out", 1)->count();

        return view("departures", ["departures" => $departures, "count" => $count]);

    }

    public function checkout() {

        if(!$this->checkUserSession) {

            return view("./errors/404");

        }

        $currentTime = Carbon::now()->hour;

        if($currentTime < 7 || $currentTime > 15) {

            return redirect()->route("user.index")->withInput()->withErrors(["ckeck_out_problem" => "You can't check out now ! "]);

        }

        $checkInTest = Attendance::where("user_id", $this->userSession)->where("check_in", Carbon::now()->format("Y-m-d"))->exists();

        if(!$checkInTest) {

            return to_route("user.index");

        }

        return view("check-out");

    }

    public function checkout_test(Request $request) {

        $currentTimeHour = Carbon::now()->hour;

        $userCheckOut = Departure::where("user_id", $this->userSession)->where("check_out", Carbon::now()->format("Y-m-d"))->exists();

        if($request->id == $this->userSession) {

            if($userCheckOut) {

                return redirect()->back()->withInput()->withErrors(["check_out_exists" => "You've already signed out"]);

            } else {

                $earlyCheckOut = $currentTimeHour < 15 ? 1 : 0;

                Departure::create([

                    "check_out" => Carbon::now(),

                    "early_check_out" => $earlyCheckOut,

                    "user_id" => $this->userSession,

                ]);

                return to_route("user.checkout");

            }

        } else {

            return redirect()->back()->withInput()->withErrors(["id_error" => "ID is incorrect !"]);

        }

    }

}
