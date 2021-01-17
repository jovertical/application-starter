<?php

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\{get, post};

uses(RefreshDatabase::class);

test('registration screen can be rendered', function () {
    $response = get('/register');

    $response->assertInertia('Auth/Register');
});

test('new users can register', function () {
    $response = post('/register', [
        'first_name' => 'John',
        'last_name' => 'Doe',
        'email' => 'johndoe@example.com',
        'password' => 'password',
    ]);

    test()->assertAuthenticated();

    $response->assertRedirect(RouteServiceProvider::HOME);
});
