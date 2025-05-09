<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SprintController;
use App\Http\Controllers\UserStoryController;
use App\Http\Controllers\BacklogController;
use App\Http\Controllers\BurndownChartController;
use App\Http\Controllers\TaskController;

// === ROUTE D'ACCUEIL ===
Route::get('/', function () {
    return view('welcome'); // Vue d'accueil (resources/views/welcome.blade.php)
});

// === DASHBOARD ===
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// === PROFILE UTILISATEUR ===
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// ==================== PROJETS ====================
Route::resource('projects', ProjectController::class);

// Ajouter ou modifier les membres d'un projet
Route::get('/projects/{id}/members', [ProjectController::class, 'editMembers'])->name('projects.editMembers');
Route::post('/projects/{id}/members', [ProjectController::class, 'updateMembers'])->name('projects.updateMembers');

// ==================== SPRINTS ====================
// Afficher tous les sprints
Route::get('/sprints', [SprintController::class, 'index'])->name('sprints.index');

// Formulaire de création d’un sprint pour un projet donné
Route::get('/projects/{project}/sprints/createsprints', [SprintController::class, 'create'])->name('sprints.create');

// Enregistrer un nouveau sprint
Route::post('/projects/{project}/sprints', [SprintController::class, 'store'])->name('sprints.store');

// Modifier un sprint
Route::get('/sprints/{sprint}/edit', [SprintController::class, 'edit'])->name('sprints.edit');
Route::put('/sprints/{sprint}', [SprintController::class, 'update'])->name('sprints.update');

// Supprimer un sprint
Route::delete('/sprints/{sprint}', [SprintController::class, 'destroy'])->name('sprints.destroy');

// ==================== KANBAN & TÂCHES ====================
Route::middleware(['auth'])->group(function () {
    Route::get('/kanban', [TaskController::class, 'kanban'])->name('kanban');
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::put('/tasks/{task}/status', [TaskController::class, 'updateStatus'])->name('tasks.updateStatus');
});

// ==================== BURNDOWN CHART ====================
Route::get('/burndown-chart', [BurndownChartController::class, 'index'])->middleware(['auth']);

// ==================== USER STORIES - VUES ====================
Route::get('/user-stories-view', [UserStoryController::class, 'showAllView'])->name('user_stories.view');

// ==================== BACKLOGS - VUES ====================
Route::get('/backlogs-view', [BacklogController::class, 'showAllView'])->name('backlogs.view');

// ==================== USER STORIES - API ====================
Route::get('/user-stories', [UserStoryController::class, 'index']);
Route::post('/user-stories', [UserStoryController::class, 'store']);
Route::get('/user-stories/{id}', [UserStoryController::class, 'show']);
Route::put('/user-stories/{id}', [UserStoryController::class, 'update']);
Route::delete('/user-stories/{id}', [UserStoryController::class, 'destroy']);

// ==================== BACKLOGS - API ====================
Route::get('/backlogs', [BacklogController::class, 'index']);
Route::post('/backlogs', [BacklogController::class, 'store']);
Route::get('/backlogs/{id}', [BacklogController::class, 'show']);
Route::put('/backlogs/{id}', [BacklogController::class, 'update']);
Route::delete('/backlogs/{id}', [BacklogController::class, 'destroy']);
// formulaire de création d’un sprint pour un projet donné
Route::get('/projects/{project}/sprints/createsprint', [SprintController::class, 'create'])->name('sprints.create');

// formulaire de création d’un sprint pour un projet donné
Route::get('/projects/{project}/sprints/createsprint', [SprintController::class, 'create'])->name('sprints.create');
