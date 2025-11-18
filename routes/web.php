<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Laravel\WorkOS\Http\Middleware\ValidateSessionWithWorkOS;

Route::get('/', fn (): Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View => view('welcome'));

Route::middleware([
    'auth',
    ValidateSessionWithWorkOS::class,
])->group(function (): void {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
