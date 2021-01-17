<?php

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\URL;

use function Pest\Laravel\get;
use function Tests\login;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->user = login(User::factory()->create([
        'email_verified_at' => null,
    ]));
});

test('email verification screen can be rendered', function () {
    $response = get('/verify-email');

    $response->assertInertia('Auth/VerifyEmail');
});

test('email can be verified', function () {
    Event::fake();

    $verificationUrl = URL::temporarySignedRoute(
        'verification.verify',
        now()->addMinutes(60),
        ['id' => $this->user->id, 'hash' => sha1($this->user->email)]
    );

    $response = get($verificationUrl);

    Event::assertDispatched(Verified::class);

    test()->assertTrue($this->user->fresh()->hasVerifiedEmail());

    $response->assertRedirect(RouteServiceProvider::HOME . '?verified=1');
});

test('email is not verified with invalid hash', function () {
    $verificationUrl = URL::temporarySignedRoute(
        'verification.verify',
        now()->addMinutes(60),
        ['id' => $this->user->id, 'hash' => sha1('wrong-email')]
    );

    get($verificationUrl);

    test()->assertFalse($this->user->fresh()->hasVerifiedEmail());
});
