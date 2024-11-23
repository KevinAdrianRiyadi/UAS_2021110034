<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\userdata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class usercontroller extends Controller
{
    public function inputuser(Request $request)
    {
        // dd($request);
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',

        ]);
        $data['password'] = Hash::make($data['password']);
        // dd($data);
        userdata::create($data);

        return redirect()->route('Home')->with('success', 'Registrasi Berhasil, Silakan Login!');
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect()->route('Home');
    }

    public function login(Request $request)
    {
        // dd($request);
        $data = $request->validate(
            [
                'email' => 'required',
                'password' => 'required'
            ]
        );

        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
            return redirect()->route('Home');
        } else {
            return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
        }
    }
}
