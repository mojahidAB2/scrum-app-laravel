<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserStoryController;
use App\Http\Controllers\BacklogController;


Route::get('/', function () {
    return view('welcome');
});
// Route pour afficher toutes les user stories
Route::get('/user-stories-view', [UserStoryController::class, 'showAllView'])->name('user_stories.view');

// Route pour afficher toutes les Backlogs
Route::get('/backlogs-view', [BacklogController::class, 'showAllView'])->name( 'backlogs.view');


Route::get('/user-stories', [UserStoryController::class, 'index']);
Route::post('/user-stories', [UserStoryController::class, 'store']);
Route::get('/user-stories/{id}', [UserStoryController::class, 'show']);
Route::put('/user-stories/{id}', [UserStoryController::class, 'update']);
Route::delete('/user-stories/{id}', [UserStoryController::class, 'destroy']);

Route::get('/backlogs', [BacklogController::class, 'index']);
Route::post('/backlogs', [BacklogController::class, 'store']);
Route::get('/backlogs/{id}', [BacklogController::class, 'show']);
Route::put('/backlogs/{id}', [BacklogController::class, 'update']);
Route::delete('/backlogs/{id}', [BacklogController::class, 'destroy']);
