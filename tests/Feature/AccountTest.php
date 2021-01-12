<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('account settings screen can be rendered', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get('/settings/account');

    $response->assertInertia('Settings/Account');
});

test('account information can be updated', function () {
    $user = User::factory()->create();

    $this->get('/settings/account');

    $this->actingAs($user);

    $response = $this->patch('/settings/account', [
        'first_name' => $user->first_name,
        'last_name' => $user->last_name,
        'email' => 'test@example.com'
    ]);

    $this->assertDatabaseHas('users', ['email' => 'test@example.com']);

    $response->assertRedirect('/settings/account');
});
