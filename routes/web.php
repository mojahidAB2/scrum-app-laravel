<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    UserController,
    ProfileController,
    ProjectController,
    SprintController,
    UserStoryController,
    BacklogController,
    CommentController,
    DashboardController,
    Auth\AuthenticatedSessionController
};

// === ROUTE D'ACCUEIL APRÈS LOGIN ===
Route::get('/', fn() => view('welcome'));

// === DASHBOARD PRINCIPAL ===
Route::middleware('auth')->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// ✅ PO Dashboard
Route::get('/dashboard/po', [ProjectController::class, 'poDashboard'])->middleware('auth')->name('dashboard.po');

// ✅ SM Dashboard
Route::get('/dashboard/sm', [ProjectController::class, 'smDashboard'])->middleware('auth')->name('dashboard.sm');

// Affiche le formulaire de création du sprint (avec id du projet)
Route::get('/sprints/create/{project}', [SprintController::class, 'create'])->name('sprints.create');

// Enregistre le sprint
Route::post('/sprints/store/{project}', [SprintController::class, 'store'])->name('sprints.store');

//supprime le sprint
Route::delete('/sprints/{sprint}', [SprintController::class, 'destroy'])->name('sprints.destroy');

// Dashboard du développeur
Route::get('/dashboard/dev', [ProjectController::class, 'devDashboard'])
    ->middleware('auth')
    ->name('dashboard.dev');

// Détails d’un projet assigné
Route::get('/dev/projects/{project}', [ProjectController::class, 'developerProjectDetails'])
    ->middleware('auth')
    ->name('projects.dev.details');

// Liste des projets assignés au développeur
Route::get('/dev/projects', [ProjectController::class, 'developerProjects'])
    ->middleware('auth')
    ->name('projects.dev.index');

    // Formulaire d’assignation d'une user story à un développeur
Route::get('/assign-user-story', [UserController::class, 'showAssignForm'])
    ->middleware('auth')
    ->name('userstories.assignForm');

// Traitement du formulaire d’assignation
Route::post('/assign-user-story', [UserController::class, 'assignDeveloper'])
    ->middleware('auth')
    ->name('userstories.assignDeveloper');


    // Affichage des backlogs pour le développeur connecté
Route::get('/backlogs/dev', [BacklogController::class, 'devIndex'])
    ->middleware('auth')
    ->name('backlogs.dev.index');

    // Affichage du détail d'une user story
    Route::get('/sprints/dev', [SprintController::class, 'devIndex'])
    ->middleware('auth')
    ->name('sprints.dev.index');


// 👉 Choix du rôle après inscription
Route::middleware('auth')->group(function () {
    Route::get('/choisir-role', [UserController::class, 'choisirRole'])->name('choisir.role');
    Route::post('/choisir-role', [UserController::class, 'enregistrerRole'])->name('choisir.role.post');
});
// === PROFILE UTILISATEUR ===
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

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
Route::put('/user-stories/{id}', [UserStoryController::class, 'update'])->name('user_stories.update');
Route::delete('/user-stories/{id}', [UserStoryController::class, 'destroy'])->name('user_stories.destroy');
Route::get('/projects/{project}/user-stories', [UserStoryController::class, 'byProject'])->name('userstories.byProject');
Route::get('/user-stories/project/{projectId}', [UserStoryController::class, 'byProject'])->name('user_stories.byProject');

// === BACKLOGS ===
Route::get('/backlogs', [BacklogController::class, 'showAllView'])->name('backlogs.view');
Route::get('/backlogs/create', [BacklogController::class, 'create'])->name('backlogs.create');
Route::post('/backlogs/store', [BacklogController::class, 'store'])->name('backlogs.store');
Route::get('/backlogs/{id}/edit', [BacklogController::class, 'edit'])->name('backlogs.edit');
Route::put('/backlogs/{id}', [BacklogController::class, 'update'])->name('backlogs.update');
Route::delete('/backlogs/{backlog}', [BacklogController::class, 'destroy'])->name('backlogs.destroy');

Route::get('/projects/{project}/backlogs', [BacklogController::class, 'byProject'])->name('backlogs.byProject');
Route::get('/backlogs/by-project/{projectId}', [BacklogController::class, 'backlogsByProject'])->name('backlogs.byProject');
Route::post('/backlogs/{id}/remove-from-sprint', [BacklogController::class, 'removeFromSprint'])->name('backlogs.remove');
Route::get('/sprints/{id}/assign-backlog', [SprintController::class, 'showAssignBacklogForm'])->name('sprints.assign.backlog.form');
// ✅ Afficher le formulaire pour assigner les backlogs à un développeur
Route::get('/assign-backlogs-dev/{user}', [BacklogController::class, 'showBacklogFormForDev'])->name('assign.backlogs.form');

// ✅ Soumettre les backlogs assignés à un développeur
Route::post('/assign-backlogs-dev/{user}', [BacklogController::class, 'assignBacklogsToDev'])->name('assign.backlogs.to.dev');

// ✅ Voir la liste des développeurs
Route::get('/scrum-master/team', [BacklogController::class, 'teamManagement'])->name('scrum.team.manage');
Route::delete('/backlogs/remove-from-dev/{user}/{backlog}', [BacklogController::class, 'removeBacklogFromDev'])->name('backlogs.remove.from.dev');
// GET → formulaire
Route::get('/sprints/{sprint}/assign-backlog', [BacklogController::class, 'assignBacklogsForm'])->name('sprints.assign.backlog.form');

// POST → traitement
Route::post('/sprints/{sprint}/assign-backlog', [BacklogController::class, 'assignBacklogsToSprint'])->name('sprints.assign.backlog.store');


// === SPRINTS ===
Route::get('/sprints', [SprintController::class, 'index'])->name('sprints.index');
Route::get('/projects/{project}/sprints/create', [SprintController::class, 'create'])->name('sprints.create');
Route::post('/projects/{project}/sprints', [SprintController::class, 'store'])->name('sprints.store');
Route::get('/sprints/{sprint}/edit', [SprintController::class, 'edit'])->name('sprints.edit');
Route::put('/sprints/{sprint}', [SprintController::class, 'update'])->name('sprints.update');
Route::delete('/sprints/{sprint}', [SprintController::class, 'destroy'])->name('sprints.destroy');
Route::get('/projects/{project}/sprints', [SprintController::class, 'byProject'])->name('sprints.byProject');

Route::get('/sprints/{id}/assign-backlog', [SprintController::class, 'showAssignBacklogForm'])->name('sprints.assign.form');
Route::post('/sprints/{id}/assign-backlog', [SprintController::class, 'assignBacklog'])->name('sprints.assign.backlog');
Route::get('/sprints/po', [SprintController::class, 'poIndex'])->name('sprints.po');



Route::post('/comments/store', [CommentController::class, 'store'])->name('comments.store');
