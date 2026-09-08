<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');
Route::livewire('/post/create', 'pages::post.create');

Route::middleware('guest')->group(function () {
    Route::livewire('/login', 'auth.login')
        ->name('login');
});

// Route::middleware('auth')->group(function () {
//     Route::livewire('/dashboard', 'dashboard.index')
//         ->name('dashboard');
// });
Route::livewire('/dashboard', 'dashboard.index');
