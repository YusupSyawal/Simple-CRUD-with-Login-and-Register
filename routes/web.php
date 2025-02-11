<?php

use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->middleware('auth');
 
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::view('/login','auth.login')->name('login');
Route::view('/register','auth.register')->name('register');
route::get('/logout', function (Request $request) {
    FacadesAuth::logout();
    $request->session()->flush();
    return redirect()->route('login');
})->name('logout');