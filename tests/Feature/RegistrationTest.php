<?php

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('registration screen can be rendered', function () {
    $response = $this->get('/register');

    $response->assertInertia('Auth/Register');
});

test('new users can register', function () {
    $response = $this->post('/register', [
        'first_name' => 'John',
        'last_name' => 'Doe',
        'email' => 'johndoe@example.com',
        'password' => 'password',
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(RouteServiceProvider::HOME);
});
