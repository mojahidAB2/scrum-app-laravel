use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserStoryController;
use App\Http\Controllers\BacklogController;

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


// ======================= ROUTES AUTO-GÉNÉRÉES (Laravel Breeze ou Jetstream) =======================

// Ce fichier contient d’autres routes liées à l’authentification générées automatiquement
require __DIR__.'/auth.php';
