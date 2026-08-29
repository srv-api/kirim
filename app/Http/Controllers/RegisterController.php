<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    /**
     * Menampilkan halaman register.
     */
    public function create()
    {
        return view('auth.register');
    }


    /**
     * Proses register user.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users,email',
            ],

            'whatsapp' => [
                'required',
                'string',
                'max:20',
                'unique:users,whatsapp',
            ],

            'password' => [
                'required',
                'string',
                'min:8',
            ],

            'referral_code' => [
                'nullable',
                'string',
                'max:50',
                Rule::exists('users', 'referral_code'),
            ],
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',

            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',

            'whatsapp.required' => 'Nomor WhatsApp wajib diisi.',
            'whatsapp.unique' => 'Nomor WhatsApp sudah terdaftar.',

            'password.required' => 'Kata sandi wajib diisi.',
            'password.min' => 'Kata sandi minimal 8 karakter.',

            'referral_code.exists' => 'Kode referral tidak ditemukan.',
        ]);


        /*
        |--------------------------------------------------------------------------
        | Cari pemilik referral
        |--------------------------------------------------------------------------
        */

        $referrer = null;

        if (!empty($validated['referral_code'])) {

            $referrer = User::where(
                'referral_code',
                $validated['referral_code']
            )->first();

        }


        /*
        |--------------------------------------------------------------------------
        | Generate kode referral unik
        |--------------------------------------------------------------------------
        */

        do {

            $newReferralCode = strtoupper(
                Str::random(8)
            );

        } while (
            User::where(
                'referral_code',
                $newReferralCode
            )->exists()
        );


        /*
        |--------------------------------------------------------------------------
        | Buat User
        |--------------------------------------------------------------------------
        */

        $user = User::create([
            'name' => $validated['name'],

            'email' => $validated['email'],

            'whatsapp' => $validated['whatsapp'],

            'password' => $validated['password'],

            'referral_code' => $newReferralCode,

            'referred_by' => $referrer?->id,
        ]);
        $user->assignRole('owner');

        /*
        |--------------------------------------------------------------------------
        | Login otomatis
        |--------------------------------------------------------------------------
        */

        Auth::login($user);

        $request->session()->regenerate();


        /*
        |--------------------------------------------------------------------------
        | Redirect
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('dashboard')
            ->with(
                'success',
                'Pendaftaran berhasil. Selamat datang!'
            );
    }
}