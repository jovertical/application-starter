<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class WelcomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Inertia\Response
     */
    public function __invoke()
    {
        return Inertia::render('Welcome');
    }
}
