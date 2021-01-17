<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use function Pest\Laravel\{get, patch};
use function Tests\login;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->user = login();
});

test('change password screen can be rendered', function () {
    $response = get('/settings/password');

    $response->assertInertia('Settings/Password');
});

test('user can change their password', function () {
    get('/settings/password');

    $response = patch('/settings/password', [
        'current_password' => 'password',
        'password' => 'new-password'
    ]);

    $response->assertSessionHasNoErrors();

    $response->assertRedirect('/settings/password');

    test()->assertTrue(Hash::check('new-password', Auth::user()->password));
});

test('user can not change their password when current is invalid', function () {
    $response = patch('/settings/password', [
        'current_password' => 'wrong-password',
        'password' => 'new-password'
    ]);

    $response->assertSessionHasErrors([
        'current_password' => __('auth.password'),
    ]);

    test()->assertFalse(Hash::check('new-password', Auth::user()->password));
});
