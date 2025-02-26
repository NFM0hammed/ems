<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\User;
use App\Models\Absence;
use App\Models\Attendance;
use App\Models\Departure;

class DeparturesController extends Controller
{
     public function departures($id) {

        if(!$this->checkUserSession) {

            return view("./errors/404");

        }

        $checkUser = User::find($id);

        if(is_null($checkUser)) {

            return view("./errors/404");

        }

        $departures = Departure::where("user_id", $id)->get();

        $departuresCount = Departure::where("user_id", $id)->where("early_check_out", 1)->count();

        return view("departures", ["departures" => $departures, "count" => $departuresCount]);

    }

    public function show() {

        if(!$this->checkUserSession) {

            return view("./errors/404");

        }

        $currentTime = Carbon::now()->hour;

        if($currentTime > 15) {

            $checkOut = User::whereNotIn("id",
                        Departure::where("check_out", Carbon::now()->format("Y-m-d"))->pluck("user_id"))->whereIn("id",
                        Attendance::where("check_in", Carbon::now()->format("Y-m-d"))->pluck("user_id"))->whereNotIn("id",
                        Absence::where("absence_date", Carbon::now()->format("Y-m-d"))->pluck("user_id"))->where("role", 1)->get();

            return view("check-out", ["users" => $checkOut]);

        }

        return redirect()->route("users.index")->withErrors(["Check_out_problem" => "Check out Opens after 4 PM"]);

    }


    public function add_checkout($id) {

        Departure::create([

            "check_out" => Carbon::now(),

            "early_check_out" => 1,

            "user_id" => $id,

        ]);

        return to_route("users.departures", $id);

    }

    public function destroy(Departure $id) {

        if(!$this->checkUserSession) {

            return view("./errors/404");

        }

        $id->update([

            "early_check_out" => 0

        ]);

        return redirect()->back();

    }

}
