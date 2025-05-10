<?php

namespace App\Http\Controllers;

use App\Models\Backlog;
use App\Models\UserStory;
use Illuminate\Http\Request;

class BacklogController extends Controller
{
    // 🔹 Afficher tous les backlogs
   public function showAllView()
{
    $backlogs = Backlog::with('userStory')->get(); 
    $userStories = UserStory::all();
    return view('userstoryetbacklogs.backlogs', compact('backlogs', 'userStories'));
}


    // 🔹 Formulaire d'ajout
    public function create()
    {
        $userStories = UserStory::all(); // pour le select
        return view('userstoryetbacklogs.create_backlog', compact('userStories'));
    }

    // 🔹 Enregistrement
    public function store(Request $request)
    {
        $request->validate([
            'project_id' => 'required|numeric',
            'titre' => 'required',
            'description' => 'required',
            'user_story_id' => 'nullable|exists:user_stories,id',
        ]);

        Backlog::create([
            'project_id' => $request->project_id,
            'titre' => $request->titre,
            'description' => $request->description,
            'user_story_id' => $request->user_story_id,
        ]);

        return redirect()->route('backlogs.view')->with('success', 'Backlog ajouté avec succès.');
    }

    // 🔹 Formulaire de modification
    public function edit($id)
    {
        $backlog = Backlog::findOrFail($id);
        $userStories = UserStory::all();
        return view('userstoryetbacklogs.edit_backlog', compact('backlog', 'userStories'));
    }

    // 🔹 Mise à jour
    public function update(Request $request, $id)
    {
        $request->validate([
            'titre' => 'required',
            'description' => 'required',
            'user_story_id' => 'nullable|exists:user_stories,id',
        ]);

        $backlog = Backlog::findOrFail($id);
        $backlog->update($request->all());

        return redirect()->route('backlogs.view')->with('success', 'Backlog mis à jour avec succès.');
    }

    // 🔹 Suppression
    public function destroy($id)
    {
        $backlog = Backlog::findOrFail($id);
        $backlog->delete();

        return redirect()->route('backlogs.view')->with('success', 'Backlog supprimé avec succès.');
    }
}
