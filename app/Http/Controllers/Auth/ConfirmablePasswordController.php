<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Rules\CorrectPassword;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ConfirmablePasswordController extends Controller
{
    /**
     * Create a new controller instance
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the confirm password view.
     *
     * @return \Inertia\Response
     */
    public function show()
    {
        return Inertia::render('Auth/ConfirmPassword');
    }

    /**
     * Confirm the user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $request->validate([
            'password' => [
                'required',
                'string',
                new CorrectPassword($request->user()->email)
            ]
        ]);

        $request->session()->put('auth.password_confirmed_at', time());

        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
