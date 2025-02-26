<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Attendance;

class AttendancesController extends Controller
{
     public function attendances($id) {

        if(!$this->checkUserSession) {

            return view("./errors/404");

        }

        $checkUser = User::find($id);

        if(is_null($checkUser)) {

            return view("./errors/404");

        }

        $attendances = Attendance::where("user_id", $id)->get();

        $attendancesCount = Attendance::where("user_id",  $id)->where("delay", 1)->count();

        return view("attendances", ["attendances" => $attendances, "count" => $attendancesCount]);

    }

    public function destroy(Attendance $id) {

        if(!$this->checkUserSession) {

            return view("./errors/404");

        }

        $id->update([

            "delay" => 0

        ]);

        return redirect()->back();

    }

}
