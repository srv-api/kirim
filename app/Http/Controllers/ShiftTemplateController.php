<?php

namespace App\Http\Controllers;

use App\Models\ShiftTemplate;
use Illuminate\Http\Request;

class ShiftTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shifts = ShiftTemplate::latest()->get();
        return view('shift-template.index', compact('shifts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('shift-template.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        ShiftTemplate::create([
            'name' => $request->name,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'late_tolerance' => $request->late_tolerance,
            'work_days' => $request->work_days,
            'is_active' => true
        ]);

        return redirect()->route('shift-template.index')
            ->with('success','Shift berhasil dibuat');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $shift = ShiftTemplate::findOrFail($id);
        return view('shift-template.edit', compact('shift'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $shift = ShiftTemplate::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        $shift->update([
            'name' => $request->name,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'late_tolerance' => $request->late_tolerance,
            'work_days' => $request->work_days,
            'is_active' => $request->has('is_active')
        ]);

        return redirect()->route('shift-template.index')
            ->with('success','Shift berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $shift = ShiftTemplate::findOrFail($id);
        $shift->delete();

        return redirect()->route('shift-template.index')
            ->with('success','Shift berhasil dihapus');
    }
}