<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); // ambil semua user
        return view('users.index', compact('users'));
    }
    public function create()
{
    $roles = \Spatie\Permission\Models\Role::all();
    return view('users.create', compact('roles'));
}

public function store(Request $request)
{
    $request->validate([
        'name'=>'required',
        'email'=>'required|email|unique:users,email',
        'password'=>'required|min:6',
        'roles'=>'required|array'
    ]);

    $user = \App\Models\User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>bcrypt($request->password)
    ]);

    $user->syncRoles($request->roles);

    return redirect()->route('users.index');
}

public function edit($id)
{
    $user = \App\Models\User::findOrFail($id);
    $roles = \Spatie\Permission\Models\Role::all();
    return view('users.edit', compact('user','roles'));
}

public function update(Request $request, $id)
{
    $user = \App\Models\User::findOrFail($id);

    $request->validate([
        'name'=>'required',
        'email'=>'required|email|unique:users,email,'.$id,
        'roles'=>'required|array'
    ]);

    $user->update([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>$request->password ? bcrypt($request->password) : $user->password
    ]);

    $user->syncRoles($request->roles);

    return redirect()->route('users.index');
}

public function destroy($id)
{
    \App\Models\User::findOrFail($id)->delete();
    return redirect()->route('users.index');
}
public function employee()
{
    return $this->hasOne(\App\Models\Employee::class);
}
}