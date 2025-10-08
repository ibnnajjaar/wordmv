<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SocialiteController;

Route::get('/admin/auth/{provider}/redirect', [SocialiteController::class, 'redirect'])->name('login.provider');
Route::get('/admin/auth/{provider}/callback', [SocialiteController::class, 'callback'])->name('login.callback');


//Route::view('/', 'web.home.index');
