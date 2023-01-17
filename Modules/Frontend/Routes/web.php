<?php

use Illuminate\Support\Facades\Route;


Route::view('/','frontend::index');
Route::view('body-shape','frontend::bodyShape');
Route::view('mug','frontend::mug');
