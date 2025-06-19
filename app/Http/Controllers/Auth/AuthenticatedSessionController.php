<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
{
    $request->authenticate();
    $request->session()->regenerate();

    $user = Auth::user();

    // ➤ Si l'utilisateur n'a pas encore choisi son rôle
    if (!$user->role) {
        return redirect()->route('choisir.role');
    }
      
    // ➤ Redirection selon le rôle
    switch ($user->role) {
        case 'product_owner':
            return redirect('/dashboard/po');
        case 'scrum_master':
            return redirect('/dashboard/sm');
       case 'developpeur': // ✅ correction ici
    return redirect('/dashboard/dev');
        default:
            Auth::logout();
            return redirect('/login')->withErrors(['email' => 'Rôle utilisateur inconnu.']);
    }
}


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
