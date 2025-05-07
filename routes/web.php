<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



use App\Http\Controllers\ProjectController;

Route::resource('projects', ProjectController::class);


Route::get('/projects/{id}/members', [ProjectController::class, 'editMembers'])->name('projects.editMembers');
Route::post('/projects/{id}/members', [ProjectController::class, 'updateMembers'])->name('projects.updateMembers');



use App\Http\Controllers\SprintController;

Route::get('/projects/{project}/sprints/createsprints', [SprintController::class, 'create'])->name('sprints.createsprints');


// Edition
Route::get('/sprints/{sprint}/edit', [SprintController::class, 'edit'])->name('sprints.edit');

Route::put('/sprints/{sprint}', [SprintController::class, 'update'])->name('sprints.update');

// Suppression
Route::delete('/sprints/{sprint}', [SprintController::class, 'destroy'])->name('sprints.destroy');



Route::post('/projects/{project}/sprints', [SprintController::class, 'store'])->name('sprints.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



