<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\User;
use App\Models\Attendance;

class AttendancesController extends Controller
{
    public function attendances() {

        if(!$this->checkUserSession) {

            return view("./errors/404");

        }

        $attendances = Attendance::where("user_id", $this->userSession)->get();

        $count = Attendance::where("user_id", $this->userSession)->where("delay", 1)->count();

        return view("attendances", ["attendances" => $attendances, "count" => $count]);

    }

    public function checkin() {

        if(!$this->checkUserSession) {

            return view("./errors/404");

        }

        $currentTime = Carbon::now()->hour;

        if($currentTime < 7 || $currentTime > 15) {

            return redirect()->route("user.index")->withInput()->withErrors(["ckeck_in_problem" => "You can't check in now ! "]);

        }

        return view('check-in');

    }

    public function checkin_test(Request $request) {

        $currentTimeHour = Carbon::now()->hour;

        $currentTimeMin = Carbon::now()->minute;

        $userCheckIn = Attendance::where("user_id", $this->userSession)->where("check_in", Carbon::now()->format("Y-m-d"))->exists();

        if($request->id == $this->userSession) {

            if($userCheckIn) {

                return redirect()->back()->withInput()->withErrors(["check_in_exists" => "You've already signed in"]);

            } else {

                $delay = $currentTimeHour == 8 && $currentTimeMin > 30 || $currentTimeHour > 8 ? 1 : 0;

                Attendance::create([

                    "check_in" => Carbon::now(),

                    "delay" => $delay,

                    "user_id" => $this->userSession,

                ]);

                return to_route("user.checkin");

            }

        } else {

            return redirect()->back()->withInput()->withErrors(["id_error" => "ID is incorrect !"]);

        }

    }

}
