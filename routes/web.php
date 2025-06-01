<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    UserController,
    ProfileController,
    ProjectController,
    SprintController,
    UserStoryController,
    BacklogController,
    BurndownChartController,
    TaskController,
    DashboardController,
    CommentController
};

// === ROUTE D'ACCUEIL APRÈS LOGIN ===
Route::get('/', fn() => view('welcome'));

// === DASHBOARD ===
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});


// === PROFILE UTILISATEUR ===
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
    // 👉 Routes pour choisir le rôle après inscription
Route::middleware(['auth'])->group(function () {
    Route::get('/choisir-role', [UserController::class, 'choisirRole'])->name('choisir.role');
    Route::post('/choisir-role', [UserController::class, 'enregistrerRole'])->name('choisir.role.post');
});

require __DIR__.'/auth.php';

// === PROJECTS ===
Route::middleware(['auth'])->group(function () {
    // Routes RESTful : index, create, store, show, edit, update, destroy
    Route::resource('projects', ProjectController::class);
    // Édition des membres d’un projet
    Route::get('/projects/{id}/members', [ProjectController::class, 'editMembers'])
        ->name('projects.editMembers');
    // Mise à jour des membres
    Route::post('/projects/{id}/members', [ProjectController::class, 'updateMembers'])
        ->name('projects.updateMembers');
    // Liste des membres (ex: en AJAX)
    Route::get('/projects/{id}/members-list', [ProjectController::class, 'membersList'])
        ->name('projects.membersList');

});

// === USER STORIES ===
Route::get('/user-stories', [UserStoryController::class, 'showAllView'])->name('user_stories.view');
Route::get('/user-stories/create', [UserStoryController::class, 'create'])->name('user_stories.create');
Route::post('/user-stories/store', [UserStoryController::class, 'store'])->name('user_stories.store');
Route::get('/user-stories/{id}/edit', [UserStoryController::class, 'edit'])->name('user_stories.edit');
Route::post('/user-stories/{id}/update', [UserStoryController::class, 'update'])->name('user_stories.update');
Route::post('/user-stories/{id}/delete', [UserStoryController::class, 'destroy'])->name('user_stories.destroy');
Route::get('/projects/{project}/user-stories', [UserStoryController::class, 'byProject'])->name('userstories.byProject');

// === BACKLOGS ===
Route::get('/backlogs', [BacklogController::class, 'showAllView'])->name('backlogs.view');
Route::get('/backlogs/create', [BacklogController::class, 'create'])->name('backlogs.create');
Route::post('/backlogs/store', [BacklogController::class, 'store'])->name('backlogs.store');
Route::get('/backlogs/{id}/edit', [BacklogController::class, 'edit'])->name('backlogs.edit');
Route::post('/backlogs/{id}/update', [BacklogController::class, 'update'])->name('backlogs.update');
Route::post('/backlogs/{id}/delete', [BacklogController::class, 'destroy'])->name('backlogs.destroy');
Route::get('/projects/{project}/backlogs', [BacklogController::class, 'byProject'])->name('backlogs.byProject');

// === SPRINTS ===
Route::get('/sprints', [SprintController::class, 'index'])->name('sprints.index');
Route::get('/projects/{project}/sprints/create', [SprintController::class, 'create'])->name('sprints.create');
Route::post('/projects/{project}/sprints', [SprintController::class, 'store'])->name('sprints.store');
Route::get('/sprints/{sprint}/edit', [SprintController::class, 'edit'])->name('sprints.edit');
Route::put('/sprints/{sprint}', [SprintController::class, 'update'])->name('sprints.update');
Route::delete('/sprints/{sprint}', [SprintController::class, 'destroy'])->name('sprints.destroy');
Route::get('/projects/{project}/sprints', [SprintController::class, 'byProject'])->name('sprints.byProject');

// === TÂCHES & KANBAN ===
Route::resource('tasks', TaskController::class);
Route::get('/kanban', [TaskController::class, 'kanban'])->name('tasks.kanban');
Route::put('/tasks/{task}/status', [TaskController::class, 'updateStatus'])->name('tasks.updateStatus');
Route::get('/tasks/{id}', [TaskController::class, 'show'])->name('tasks.show');

// === COMMENTAIRES ===
Route::post('/comments/{type}/{id}', [CommentController::class, 'store'])->name('comments.store');

// === BURNDOWN CHART ===
Route::get('/burndown-chart', [BurndownChartController::class, 'index'])->name('burndown.index');
