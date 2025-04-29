<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/*Route::get('/creerprojet', function () {
    return view('creationprojet');
});
*/

Route::get('/teams', function () {
    return view('team');
});

Route::get('/creerprojet', ['\App\Http\Controllers\ProjectController','index']);