<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class AccountController extends Controller
{
    /**
     * Create a new controller instance
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the account settings view.
     *
     * @return \Inertia\Response
     */
    public function edit()
    {
        return Inertia::render('Settings/Account');
    }

    /**
     * Handle an incoming update request.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $formData = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore(Auth::id())
            ],
        ]);

        $user = Auth::user();
        $user->update($formData);

        return back()
            ->with('message', 'Your profile information has been updated!');
    }
}
