use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserStoryController;
use App\Http\Controllers\BacklogController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProfileController;

// ======================= PAGE D’ACCUEIL =======================

// Page principale du site (welcome.blade.php)
Route::get('/', function () {
    return view('welcome');
});


// ======================= TABLEAU DE BORD =======================

// Page dashboard accessible uniquement aux utilisateurs authentifiés et vérifiés
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// ======================= AUTHENTIFICATION =======================

// Formulaire de connexion
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Traitement du login
Route::post('/login', [LoginController::class, 'login']);

// Déconnexion
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Formulaire d'inscription
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');

// Traitement de l'inscription
Route::post('/register', [RegisterController::class, 'register']);


// ======================= PROFIL UTILISATEUR =======================

// Routes protégées : uniquement accessibles aux utilisateurs connectés
Route::middleware('auth')->group(function () {
    // Page de modification du profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    // Mise à jour du profil
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Suppression du compte utilisateur
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// ======================= USER STORIES (BLADE + API) =======================

// Vue Blade pour lister les user stories
Route::get('/user-stories-view', [UserStoryController::class, 'showAllView'])->name('user_stories.view');

// API : Récupérer toutes les user stories (format JSON)
Route::get('/user-stories', [UserStoryController::class, 'index']);

// API : Créer une nouvelle user story
Route::post('/user-stories', [UserStoryController::class, 'store']);

// API : Voir une user story par son ID
Route::get('/user-stories/{id}', [UserStoryController::class, 'show']);

// API : Modifier une user story
Route::put('/user-stories/{id}', [UserStoryController::class, 'update']);

// API : Supprimer une user story
Route::delete('/user-stories/{id}', [UserStoryController::class, 'destroy']);


// ======================= BACKLOGS (BLADE + API) =======================

// Vue Blade pour lister les tâches backlog
Route::get('/backlogs-view', [BacklogController::class, 'showAllView'])->name('backlogs.view');

// API : Lister toutes les tâches backlog
Route::get('/backlogs', [BacklogController::class, 'index']);

// API : Ajouter une nouvelle tâche
Route::post('/backlogs', [BacklogController::class, 'store']);

// API : Voir une tâche par ID
Route::get('/backlogs/{id}', [BacklogController::class, 'show']);

// API : Modifier une tâche backlog
Route::put('/backlogs/{id}', [BacklogController::class, 'update']);

// API : Supprimer une tâche backlog
Route::delete('/backlogs/{id}', [BacklogController::class, 'destroy']);


// ======================= ROUTES AUTO-GÉNÉRÉES (Laravel Breeze ou Jetstream) =======================

// Ce fichier contient d’autres routes liées à l’authentification générées automatiquement
require __DIR__.'/auth.php';
// Authentification
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Inscription
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
