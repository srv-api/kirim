<?php

namespace App\Http\Controllers;

use App\Models\TimeOff;
use App\Models\Employee;
use Illuminate\Http\Request;

class TimeOffController extends Controller
{

public function index()
{
$timeoffs = TimeOff::with('employee')->latest()->get();
$employees = Employee::all();

return view('timeoff.index',compact('timeoffs','employees'));
}

public function store(Request $request)
{

TimeOff::create([
'employee_id'=>$request->employee_id,
'type'=>$request->type,
'start_date'=>$request->start_date,
'end_date'=>$request->end_date,
'reason'=>$request->reason
]);

return back();

}

public function approve($id)
{

$to = TimeOff::findOrFail($id);
$to->status='approved';
$to->save();

return back();

}

public function reject($id)
{

$to = TimeOff::findOrFail($id);
$to->status='rejected';
$to->save();

return back();

}

}