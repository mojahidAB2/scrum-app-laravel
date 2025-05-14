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
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::put('/tasks/{task}/status', [TaskController::class, 'updateStatus'])->name('tasks.updateStatus');
});

// ==================== BURNDOWN CHART ====================
Route::get('/burndown-chart', [BurndownChartController::class, 'index'])->middleware(['auth']);

// ==================== USER STORIES - VUES ====================
Route::get('/user-stories-view', [UserStoryController::class, 'showAllView'])->name('user_stories.view');
Route::get('/user-stories/create', [UserStoryController::class, 'create'])->name('user_stories.create');
Route::post('/user-stories/store', [UserStoryController::class, 'store'])->name('user_stories.store');
Route::get('/user-stories/{id}/edit', [UserStoryController::class, 'edit'])->name('user_stories.edit');
Route::post('/user-stories/{id}/update', [UserStoryController::class, 'update'])->name('user_stories.update');
Route::post('/user-stories/{id}/delete', [UserStoryController::class, 'destroy'])->name('user_stories.destroy');

// ==================== BACKLOGS - VUES ====================
Route::get('/backlogs-view', [BacklogController::class, 'showAllView'])->name('backlogs.view');
Route::get('/backlogs/create', [BacklogController::class, 'create'])->name('backlogs.create');
Route::post('/backlogs/store', [BacklogController::class, 'store'])->name('backlogs.store');
Route::get('/backlogs/{id}/edit', [BacklogController::class, 'edit'])->name('backlogs.edit');
Route::post('/backlogs/{id}/update', [BacklogController::class, 'update'])->name('backlogs.update');
Route::post('/backlogs/{id}/delete', [BacklogController::class, 'destroy'])->name('backlogs.destroy');


// formulaire de création d’un sprint pour un projet donné
Route::get('/projects/{project}/sprints/createsprint', [SprintController::class, 'create'])->name('sprints.create');

// formulaire de création d’un sprint pour un projet donné
Route::get('/projects/{project}/sprints/createsprint', [SprintController::class, 'create'])->name('sprints.create');
Route::get('/sprints/create', [SprintController::class, 'create'])->name('sprints.createsprints');


Route::get('/user-stories', [UserStoryController::class, 'showAllView'])->name('user_stories.view');
Route::get('/backlogs', [BacklogController::class, 'showAllView'])->name('backlogs.view');
Route::get('/user-stories', [UserStoryController::class, 'showAllView'])->name('user_stories.view');


use App\Http\Controllers\CommentController;

Route::post('/comments/{type}/{id}', [CommentController::class, 'store'])->name('comments.store');
Route::get('/tasks/{id}', [TaskController::class, 'show'])->name('tasks.show');
Route::get('/projects/{project}/sprints/createsprints', [SprintController::class, 'create'])->name('sprints.createsprints');


// Edition
Route::get('/sprints/{sprint}/edit', [SprintController::class, 'edit'])->name('sprints.edit');

Route::put('/sprints/{sprint}', [SprintController::class, 'update'])->name('sprints.update');

// Suppression
Route::delete('/sprints/{sprint}', [SprintController::class, 'destroy'])->name('sprints.destroy');



Route::post('/projects/{project}/sprints', [SprintController::class, 'store'])->name('sprints.store');





// Tâches (CRUD)
Route::resource('tasks', TaskController::class);

// Kanban
Route::get('/kanban', [TaskController::class, 'kanban'])->name('tasks.kanban');

// Mise à jour du statut (ex: via Kanban)
Route::post('/tasks/{task}/status', [TaskController::class, 'updateStatus'])->name('tasks.updateStatus');

// Ajout de commentaires (polymorphiques)
Route::post('/comments/{type}/{id}', [CommentController::class, 'store'])->name('comments.store');
Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');


use App\Http\Controllers\DashboardController;

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
