<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShiftAssignment;
use App\Models\Employee;
use App\Models\ShiftTemplate;
use Carbon\Carbon;

class ShiftAssignmentController extends Controller
{

public function index()
{
    $today = Carbon::today();

    // periode 21 → 20
    if ($today->day >= 21) {
        $start = Carbon::create($today->year, $today->month, 21);
        $end = $start->copy()->addMonth()->day(20);
    } else {
        $start = Carbon::create($today->year, $today->month, 21)->subMonth();
        $end = Carbon::create($today->year, $today->month, 20);
    }

    // generate semua tanggal periode
    $dates = [];
    $current = $start->copy();

    while ($current <= $end) {
        $dates[] = $current->format('Y-m-d');
        $current->addDay();
    }

    $employees = Employee::all();
    $shifts = ShiftTemplate::all();
    // ambil assignment dalam periode
    $assignments = ShiftAssignment::with('shift')
        ->whereBetween('date', [$start, $end])
        ->get();

    return view('shift_assignments.index', compact(
        'employees',
        'dates',
        'assignments',
        'start',
        'end',
        'shifts'
    ));
}
    public function create()
    {
        $employees = Employee::all();
        $shifts = ShiftTemplate::where('is_active',1)->get();

        return view('shift_assignments.create', compact('employees','shifts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id'=>'required',
            'shift_template_id'=>'required',
            'date'=>'required|date'
        ]);

        \App\Models\ShiftAssignment::create([
            'employee_id'=>$request->employee_id,
            'shift_template_id'=>$request->shift_template_id,
            'date'=>$request->date
        ]);

        return redirect()->back()->with('success','Shift berhasil disimpan');
    }
    public function edit($id)
    {
        $assignment = ShiftAssignment::findOrFail($id);
        $employees = Employee::all();
        $shifts = ShiftTemplate::where('is_active',1)->get();

        return view('shift_assignments.edit', compact('assignment','employees','shifts'));
    }

    public function update(Request $request, $id)
    {
        $assignment = ShiftAssignment::findOrFail($id);

        $request->validate([
            'employee_id'=>'required',
            'shift_template_id'=>'required',
            'date'=>'required|date'
        ]);

        $assignment->update($request->all());

        return redirect()->route('shift-assignments.index')
            ->with('success','Jadwal dinas berhasil diupdate');
    }

    public function destroy($id)
    {
        ShiftAssignment::findOrFail($id)->delete();

        return redirect()->route('shift-assignments.index')
            ->with('success','Jadwal dinas dihapus');
    }
}