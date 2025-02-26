<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\User;
use App\Models\Absence;
use App\Models\Attendance;
use App\Models\Departure;

class AbsencesController extends Controller
{
    public function absences() {

        if(!$this->checkUserSession) {

            return view("./errors/404");

        }

        // $checkAbsence = Absence::where("user_id", $this->userSession)->where("absence_date", Carbon::now()->format("Y-m-d"))->exists();

        // $checkAttendance = Attendance::where("user_id", $this->userSession)->where("check_in", Carbon::now()->format("Y-m-d"))->exists();

        // $checkDeparture = Departure::where("user_id", $this->userSession)->where("check_out", Carbon::now()->format("Y-m-d"))->exists();

        // if(Carbon::now()->hour >= 16) {

        //     if(!$checkAttendance && !$checkDeparture && !$checkAbsence) {

        //         Absence::create([

        //             "absence" => 1,

        //             "absence_date" => Carbon::now(),

        //             "user_id" => $this->userSession,

        //         ]);

        //     }

        // }

        $absences = Absence::where("user_id", $this->userSession)->get();

        $count = Absence::where("user_id", $this->userSession)->get("absence")->count();

        return view("absences", ["absences" => $absences, "count" => $count]);

    }

}
