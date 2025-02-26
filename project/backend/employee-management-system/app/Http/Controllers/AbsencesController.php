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

    public function show() {

        if(!$this->checkUserSession) {

            return view("./errors/404");

        }

        $currentTime = Carbon::now()->hour;

        if($currentTime > 15) {

            $checkIn = User::whereNotIn("id", Attendance::where("check_in", Carbon::now()->format("Y-m-d"))->pluck("user_id"))->whereNotIn("id", Absence::where("absence_date", Carbon::now()->format("Y-m-d"))->pluck("user_id"))->where("role", 1)->get();

            return view("check-in", ["users" => $checkIn]);

        }

        return redirect()->route("users.index")->withErrors(["check_in_problem" => "Check in Opens after 4 PM"]);

    }

    public function add_absence($id) {

        Absence::create([

            "absence" => 1,

            "absence_date" => Carbon::now(),

            "user_id" => $id,

        ]);

        return to_route("users.absences", $id);

    }

    public function absences($id) {

        if(!$this->checkUserSession) {

            return view("./errors/404");

        }

        $checkUser = User::find($id);

        if(is_null($checkUser)) {

            return view("./errors/404");

        }

        $absences = Absence::where("user_id", $id)->get();

        $absencesCount = Absence::where("user_id", $id)->where("absence",  1)->count();

        return view("absences", ["absences" => $absences, "count" => $absencesCount]);

    }

    public function destroy(Absence $id) {

        if(!$this->checkUserSession) {

            return view("./errors/404");

        }

        $id->delete();

        return redirect()->back();

    }

}
