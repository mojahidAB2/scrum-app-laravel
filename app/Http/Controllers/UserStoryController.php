<?php

namespace App\Http\Controllers;

use App\Models\UserStory;
use App\Models\Comment;
use Illuminate\Http\Request;

class UserStoryController extends Controller
{
    // 🔹 Afficher toutes les User Stories (global)
    public function showAllView()
    {
        $stories = UserStory::all();
        return view('userstoryetbacklogs.user_stories', compact('stories'));
    }

    // 🔹 Formulaire de création
    public function create()
    {
        return view('userstoryetbacklogs.create_user_story');
    }

    // 🔹 Enregistrer une nouvelle User Story
    public function store(Request $request)
    {
        $request->validate([
            'project_id'   => 'required|integer',
            'titre'        => 'required|string',
            'en_tant_que'  => 'required|string',
            'je_veux'      => 'required|string',
            'afin_de'      => 'required|string',
        ]);

        UserStory::create($request->all());

        return redirect()->route('user_stories.view')->with('success', 'User Story ajoutée avec succès.');
    }

    // 🔹 Formulaire d'édition
    public function edit($id)
    {
        $story = UserStory::findOrFail($id);
        return view('userstoryetbacklogs.edit_user_story', compact('story'));
    }

    // 🔹 Mise à jour
    public function update(Request $request, $id)
    {
        $request->validate([
            'project_id'   => 'required|integer',
            'titre'        => 'required|string',
            'en_tant_que'  => 'required|string',
            'je_veux'      => 'required|string',
            'afin_de'      => 'required|string',
        ]);

        $story = UserStory::findOrFail($id);
        $story->update($request->all());

        return redirect()->route('user_stories.view')->with('success', 'User Story mise à jour avec succès.');
    }

    // 🔹 Supprimer
    public function destroy($id)
    {
        $story = UserStory::findOrFail($id);
        $story->delete();

        return redirect()->route('user_stories.view')->with('success', 'User Story supprimée avec succès.');
    }

    // 🔹 Relation avec les commentaires (morphMany)
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    // 🔹 Afficher User Stories selon le projet sélectionné
    public function byProject($projectId)
    {
        $stories = UserStory::where('project_id', $projectId)->get();
        return view('userstoryetbacklogs.user_stories_by_project', compact('stories', 'projectId'));
    }
}
