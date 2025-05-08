<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserStoryController;
use App\Http\Controllers\BacklogController;

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
use App\Http\Controllers\BurndownChartController;
use App\Http\Controllers\TaskController;

Route::middleware(['auth'])->group(function () {
    // autres routes...

    Route::get('/kanban', [TaskController::class, 'kanban'])->name('kanban');
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::put('/tasks/{task}/status', [TaskController::class, 'updateStatus'])->name('tasks.updateStatus');
});

Route::get('/burndown-chart', [BurndownChartController::class, 'index'])->middleware(['auth']);

//  Route d'accueil (page par défaut quand on accède à "/")
Route::get('/', function () {
    return view('welcome'); // Vue située dans resources/views/welcome.blade.php
});

//  Route pour afficher toutes les User Stories dans une page Blade
Route::get('/user-stories-view', [UserStoryController::class, 'showAllView'])->name('user_stories.view');

//  Route pour afficher toutes les Backlogs dans une page Blade
Route::get('/backlogs-view', [BacklogController::class, 'showAllView'])->name('backlogs.view');


//  ROUTES API pour les User Stories


//  GET : Récupérer toutes les User Stories (en JSON)
Route::get('/user-stories', [UserStoryController::class, 'index']);

//  POST : Ajouter une nouvelle User Story
Route::post('/user-stories', [UserStoryController::class, 'store']);

//  GET : Afficher une User Story spécifique
Route::get('/user-stories/{id}', [UserStoryController::class, 'show']);

//  PUT : Modifier une User Story
Route::put('/user-stories/{id}', [UserStoryController::class, 'update']);

//  DELETE : Supprimer une User Story
Route::delete('/user-stories/{id}', [UserStoryController::class, 'destroy']);
//  ROUTES API pour les Backlogs

//  GET : Récupérer tous les backlogs
Route::get('/backlogs', [BacklogController::class, 'index']);

//  POST : Ajouter un backlog
Route::post('/backlogs', [BacklogController::class, 'store']);

//  GET : Afficher un backlog par ID
Route::get('/backlogs/{id}', [BacklogController::class, 'show']);

//  PUT : Modifier un backlog
Route::put('/backlogs/{id}', [BacklogController::class, 'update']);

// DELETE : Supprimer un backlog
Route::delete('/backlogs/{id}', [BacklogController::class, 'destroy']);




Route::get('/', function () {
    return view('welcome');
});




Route::resource('projects', ProjectController::class);


Route::get('/projects/{id}/members', [ProjectController::class, 'editMembers'])->name('projects.editMembers');
Route::post('/projects/{id}/members', [ProjectController::class, 'updateMembers'])->name('projects.updateMembers');





Route::get('/projects/{project}/sprints/createsprints', [SprintController::class, 'create'])->name('sprints.createsprints');


// Edition
Route::get('/sprints/{sprint}/edit', [SprintController::class, 'edit'])->name('sprints.edit');

Route::put('/sprints/{sprint}', [SprintController::class, 'update'])->name('sprints.update');

// Suppression
Route::delete('/sprints/{sprint}', [SprintController::class, 'destroy'])->name('sprints.destroy');




Route::post('/projects/{project}/sprints', [SprintController::class, 'store'])->name('sprints.store');

