<?php

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\{get, post};

uses(RefreshDatabase::class);

test('login screen can be rendered', function () {
    $response = get('/login');

    $response->assertInertia('Auth/Login');
});

test('users can authenticate using the login screen', function () {
    $user = User::factory()->create();

    $response = post('/login', [
        'email' => $user->email,
        'password' => 'password',
    ]);

    test()->assertAuthenticated();

    $response->assertRedirect(RouteServiceProvider::HOME);
});

test('users can not authenticate with invalid password', function () {
    $user = User::factory()->create();

    post('/login', [
        'email' => $user->email,
        'password' => 'wrong-password',
    ]);

    test()->assertGuest();
});
