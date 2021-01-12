<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

uses(RefreshDatabase::class);

test('change password screen can be rendered', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get('/settings/password');

    $response->assertInertia('Settings/Password');
});

test('user can change their password', function () {
    $user = User::factory()->create();

    $this->get('/settings/password');

    $response = $this->actingAs($user)->patch('/settings/password', [
        'current_password' => 'password',
        'password' => 'new-password'
    ]);

    $response->assertSessionHasNoErrors();

    $response->assertRedirect('/settings/password');

    $this->assertTrue(Hash::check('new-password', Auth::user()->password));
});

test('user can not change their password when current is invalid', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->patch('/settings/password', [
        'current_password' => 'wrong-password',
        'password' => 'new-password'
    ]);

    $response->assertSessionHasErrors([
        'current_password' => __('auth.password'),
    ]);

    $this->assertFalse(Hash::check('new-password', Auth::user()->password));
});
