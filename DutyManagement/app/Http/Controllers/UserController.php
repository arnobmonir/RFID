<?php

namespace App\Http\Controllers;

use App\DutySheet;
use App\Employee;
use App\RFCard;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
    public function getData($id)
    {
        $data = DutySheet::where('employee_id', $id)->with('employee')->get();
        return view('user-data', compact('data'));
    }
    public function register()
    {
        $cards = RFCard::where('active', 0)->get();
        return view('register', compact('cards'));
    }
    public function userregistration(Request $request)
    {
        $insert = new Employee();
        $insert->name = $request->name;
        $insert->r_f_card_id = $request->card;
        $insert->salary = $request->salary;
        $insert->phone = $request->phone;
        $insert->email = $request->email;
        $insert->save();
        $active = RFCard::where('id', $request->card)->first();
        $active->active = 1;
        $active->save();
    }
}
