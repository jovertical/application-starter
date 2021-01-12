<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Rules\CorrectPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class PasswordController extends Controller
{
    /**
     * Create a new controller instance
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the password settings view.
     *
     * @return \Inertia\Response
     */
    public function edit()
    {
        return Inertia::render('Settings/Password');
    }

    /**
     * Handle an incoming update request.
     */
    public function update(Request $request)
    {
        $request->validate([
            'current_password' => [
                'required',
                'string',
                new CorrectPassword($request->user()->email, 'password')
            ],

            'password' => ['required', 'string', 'min:8'],
        ]);

        Auth::user()->update([
            'password' => Hash::make($request->password)
        ]);

        return back()->with('message', 'Your password has been updated');
    }
}
