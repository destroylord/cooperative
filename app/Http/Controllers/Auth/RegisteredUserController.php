<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
Use Alert;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(UserRequest $request): RedirectResponse
    {

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'username' => $request->username,
            'place_of_birth' => $request->place_of_birth,
            'date_of_birth' => $request->date_of_birth,
            'address' => $request->address,
            'gender' => $request->gender,
            'region' => $request->region,
            'marital_status' => $request->marital_status,
            'type_work' => $request->type_work,
            'citizenship' => $request->citizenship,
            'phone' => $request->phone,
            'nik' => $request->nik
        ]);

        $user->assignRole('member');

        event(new Registered($user));

        // Auth::login($user);

        Alert::success('Behasil', 'Selamat akun anda telah terdaftar, silahkan login');
        return redirect()->route('login');
    }
}
