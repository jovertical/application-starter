<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\{get, post};
use function Tests\login;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->user = login();
});

test('confirm password screen can be rendered', function () {
    $response = get('/confirm-password');

    $response->assertInertia('Auth/ConfirmPassword');
});

test('password can be confirmed', function () {
    $response = post('/confirm-password', [
        'password' => 'password',
    ]);

    $response->assertRedirect();
    $response->assertSessionHasNoErrors();
});

test('password is not confirmed with invalid password(', function () {
    $response = post('/confirm-password', [
        'password' => 'wrong-password',
    ]);

    $response->assertSessionHasErrors();
});
