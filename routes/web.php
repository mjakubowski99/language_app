<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return inertia('Welcome');
});

Route::get('/login', function () {
    return inertia('Login');
});
