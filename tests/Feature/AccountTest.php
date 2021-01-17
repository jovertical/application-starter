<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\{get, patch};
use function Tests\login;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->user = login();
});

test('account settings screen can be rendered', function () {
    $response = get('/settings/account');

    $response->assertInertia('Settings/Account');
});

test('account information can be updated', function () {
    get('/settings/account');

    $response = patch('/settings/account', [
        'first_name' => $this->user->first_name,
        'last_name' => $this->user->last_name,
        'email' => 'test@example.com'
    ]);

    test()->assertDatabaseHas('users', ['email' => 'test@example.com']);

    $response->assertRedirect('/settings/account');
});
