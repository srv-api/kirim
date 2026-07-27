<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\User;
use App\Models\Department;
use App\Models\jobLevel;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with(['user','department'])->get();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $users = User::whereDoesntHave('employee')->get();
         $departments = Department::all();
         $jobLevels = JobLevel::all();

         return view('employees.create', compact('users','departments','jobLevels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'nullable|email',
            'user_id'=>'nullable|exists:users,id',
            'department_id'=>'required|exists:departments,id'
        ]);

        Employee::create($request->all());

        return redirect()->route('employees.index')->with('success','Employee berhasil dibuat.');
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $users = User::whereDoesntHave('employee')
                    ->orWhere('id', $employee->user_id)
                    ->get();
        $departments = Department::all();
        $jobLevels = JobLevel::all();

        return view('employees.edit', compact('employee','users','departments','jobLevels'));
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);
        $request->validate([
            'name'=>'required',
            'email'=>"nullable|email|unique:employees,email,$id",
            'department_id'=>'required|exists:departments,id',
            'user_id'=>'nullable|exists:users,id'
        ]);

        $employee->update($request->all());
        return redirect()->route('employees.index')->with('success','Employee berhasil diupdate.');
    }

    public function destroy($id)
    {
        Employee::findOrFail($id)->delete();
        return redirect()->route('employees.index')->with('success','Employee berhasil dihapus.');
    }

    public function syncFromDevice()
    {
        // Logika sinkronisasi dari device
        return redirect()->route('employees.index')->with('success','Employees berhasil disinkronisasi dari device.');
    }

    // Relasi dengan User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi dengan Department
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function jobLevel()
{
    return $this->belongsTo(JobLevel::class);
}
}