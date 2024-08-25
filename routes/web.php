<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', ['readme' => file_get_contents(base_path() . '/README.md')]);
});
