<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserStory;
use App\Models\User;

class UserController extends Controller
{
    // ✅ Afficher formulaire choix rôle
    public function choisirRole()
    {
        return view('choisir-role.choisir-role'); // view: choisir-role.blade.php
    }

    // ✅ Enregistrer rôle choisi
    public function enregistrerRole(Request $request)
    {
        $request->validate([
            'role' => 'required|in:product_owner,scrum_master,developer'
        ]);

        $user = Auth::user();
        $user->role = $request->role;
        $user->save();

        return redirect()->route('dashboard')->with('success', 'Rôle enregistré avec succès.');
    }

    // ✅ Formulaire d’assignation User Story -> développeur
    public function showAssignForm()
    {
        $stories = UserStory::all();
        $developers = User::where('role', 'developer')->get(); // 👈 correct spelling

       return view('userstoryetbacklogs.assign', compact('stories', 'developers'));

    }

    // ✅ Traitement assignation
    public function assignDeveloper(Request $request)
    {
        $request->validate([
            'user_story_id' => 'required|exists:user_stories,id',
            'developer_id' => 'required|exists:users,id',
        ]);

        $developer = User::findOrFail($request->developer_id);

        // 🔄 éviter duplication
        if (!$developer->userStories->contains($request->user_story_id)) {
            $developer->userStories()->attach($request->user_story_id);
        }

        return redirect()->back()->with('success', 'User Story assignée avec succès !');
    }
}
