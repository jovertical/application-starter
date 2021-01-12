<?php

use App\Http\Controllers\Settings\AccountController;
use App\Http\Controllers\Settings\PasswordController;

Route::get('settings/account', [AccountController::class, 'edit'])
    ->name('settings.account.edit');

Route::patch('settings/account', [AccountController::class, 'update'])
    ->name('settings.account.update');

Route::get('settings/password', [PasswordController::class, 'edit'])
    ->name('settings.password.edit');

Route::patch('settings/password', [PasswordController::class, 'update'])
    ->name('settings.password.update');
