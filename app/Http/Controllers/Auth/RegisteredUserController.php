<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Affiche la page d'inscription (formulaire).
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Gère la soumission du formulaire d'inscription.
     */
    public function store(Request $request): RedirectResponse
{
    // ✅ Validation des champs
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
    ]);

    // ✅ Création de l'utilisateur
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    // ✅ Connexion automatique
    Auth::login($user);

    // ✅ Redirection vers la page de choix du rôle
    return redirect()->route('choisir.role');
}

}
