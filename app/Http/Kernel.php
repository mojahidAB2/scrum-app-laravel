<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    // 🔹 Middleware global appliqué à toutes les requêtes HTTP (web et API)
    protected $middleware = [
        \App\Http\Middleware\TrustProxies::class, // Gère les proxys (ex: load balancer)
        \Illuminate\Http\Middleware\HandleCors::class, // Autorise les requêtes CORS (frontend ↔ backend)
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class, // Bloque les requêtes pendant la maintenance
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class, // Limite la taille des requêtes POST
        \App\Http\Middleware\TrimStrings::class, // Supprime les espaces en début/fin des champs texte
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class, // Convertit les chaînes vides en null
    ];

    // 🔹 Middleware groupés selon le type de requête : 'web' ou 'api'
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class, // Chiffre les cookies
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class, // Ajoute les cookies à la réponse
            \Illuminate\Session\Middleware\StartSession::class, // Démarre la session utilisateur
            \Illuminate\View\Middleware\ShareErrorsFromSession::class, // Partage les erreurs avec les vues Blade
            \App\Http\Middleware\VerifyCsrfToken::class, // Protège contre les attaques CSRF
            \Illuminate\Routing\Middleware\SubstituteBindings::class, // Injecte automatiquement les modèles via les routes
        ],

        'api' => [
            \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class, // Gère l’authentification avec Sanctum
            \Illuminate\Routing\Middleware\ThrottleRequests::class.':api', // Limite le nombre de requêtes (anti-spam)
            \Illuminate\Routing\Middleware\SubstituteBindings::class, // Injection des modèles pour les routes API
        ],
    ];

    // 🔹 Middleware que tu peux appeler individuellement dans les routes (ex: ->middleware('auth'))
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class, // Vérifie que l’utilisateur est connecté
        'role' => \App\Http\Middleware\CheckRole::class, // ✅ Vérifie le rôle (Product Owner, Scrum Master, etc.)
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class, // Vérifie que l’e-mail est vérifié
    ];
}
