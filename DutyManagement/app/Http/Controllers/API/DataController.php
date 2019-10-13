<?php

namespace App\Http\Controllers\API;

use App\DutySheet;
use App\Http\Controllers\Controller;

use App\Employee;
use App\RFCard;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DataController extends Controller
{

    public $successStatus = 200;
    public $failed = 500;
    public function getEmployeeIdByCard($card_no)
    {
        $employee = RFCard::where('card_id', $card_no)->with('employee')->first();
        return $employee->employee->id;
    }
    public function isRegisterd($card_no)
    {
        $registerd = RFCard::where('card_id', $card_no)->get();
        if (count($registerd) > 0 &&  $registerd->first()->active == 1) {
            return true;
        } elseif (count($registerd) > 0 &&  $registerd->first()->active == 0) {
            return false;
        } else {
            $newCard = new RFCard();
            $newCard->card_id = $card_no;
            $newCard->save();
            return false;
        }
    }
    public function isEnter($employee_id)
    {
        $today  = Carbon::now()->format('Y-m-d');
        $data = DutySheet::whereDate("created_at", $today)->where('employee_id', $employee_id)->get();
        if (count($data) == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function insert(Request $request)
    {
        $card_no = $request->card_id;
        if ($this->isRegisterd($card_no)) {
            $data = new DutySheet();
            $time = $request->time;
            $employee_id = $this->getEmployeeIdByCard($card_no);
            if ($this->isEnter($employee_id)) {
                $data->employee_id = $employee_id;
                $data->enter_time = $time;
                $data->save();
            } else {
                $today  = Carbon::now()->format('Y-m-d');
                $update = DutySheet::whereDate("created_at", $today)->where('employee_id', $employee_id)->first();
                $update->exit_time = $time;
                $update->save();
            }

            return response()->json(['success' => "success"], $this->successStatus);
        } else {
            return response()->json(['success' => "failed"], $this->failed);
        }
    }
}
