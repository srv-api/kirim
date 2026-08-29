<?php

namespace App\Http\Controllers\Owner\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    /**
     * Tampilkan profile
     */
    public function index()
    {
        $user = auth()->user();

        return view(
            'owner.panel.profile.index',
            compact('user')
        );
    }


    /**
     * Update profile
     */
    public function update(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')
                    ->ignore($user->id),
            ],

            'whatsapp' => [
                'required',
                'string',
                'max:30',
                Rule::unique('users', 'whatsapp')
                    ->ignore($user->id),
            ],

            'password' => [
                'nullable',
                'string',
                'min:8',
                'confirmed',
            ],
        ], [
            'name.required' =>
                'Nama wajib diisi.',

            'email.required' =>
                'Email wajib diisi.',

            'email.email' =>
                'Format email tidak valid.',

            'email.unique' =>
                'Email sudah digunakan.',

            'whatsapp.required' =>
                'Nomor WhatsApp wajib diisi.',

            'whatsapp.unique' =>
                'Nomor WhatsApp sudah digunakan.',

            'password.min' =>
                'Password minimal 8 karakter.',

            'password.confirmed' =>
                'Konfirmasi password tidak sesuai.',
        ]);


        /*
        |--------------------------------------------------------------------------
        | Update data dasar
        |--------------------------------------------------------------------------
        */

        $user->name = $validated['name'];

        $user->email = $validated['email'];

        $user->whatsapp = $validated['whatsapp'];


        /*
        |--------------------------------------------------------------------------
        | Update password jika diisi
        |--------------------------------------------------------------------------
        */

        if (!empty($validated['password'])) {

            $user->password = Hash::make(
                $validated['password']
            );

        }


        $user->save();


        return back()->with(
            'success',
            'Profile berhasil diperbarui.'
        );
    }
}