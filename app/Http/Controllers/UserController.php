<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function choisirRole()
    {
        return view('choisir-role'); // 📄 crée la vue choisir-role.blade.php
    }

    public function enregistrerRole(Request $request)
    {
        $request->validate([
            'role' => 'required|in:product_owner,scrum_master,developer'
        ]);

        $user = Auth::user();
        $user->role = $request->role;
        $user->save();

        return redirect()->route('dashboard');
    }
}
