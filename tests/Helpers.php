<?php

namespace Tests;

use App\Models\User;

use function Pest\Laravel\actingAs;

function login(User $user = null)
{
    $user ??= User::factory()->create();

    actingAs($user);

    return $user;
}
