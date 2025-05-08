<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
use App\Http\Controllers\BurndownChartController;
use App\Http\Controllers\TaskController;

Route::middleware(['auth'])->group(function () {
    // autres routes...

    Route::get('/kanban', [TaskController::class, 'kanban'])->name('kanban');
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::put('/tasks/{task}/status', [TaskController::class, 'updateStatus'])->name('tasks.updateStatus');
});

Route::get('/burndown-chart', [BurndownChartController::class, 'index'])->middleware(['auth']);


