<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/game/{id}', function ($id) {
    return "Jeu n°{$id}";
})->whereNumber('id')->name('games.show');