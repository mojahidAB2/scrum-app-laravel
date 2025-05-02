<?php

namespace App\Http\Controllers;

use App\Models\UserStory;
use Illuminate\Http\Request;

class UserStoryController extends Controller // Contrôleur pour gérer les User Stories
{
    public function showAllView()
{
    $userStories = UserStory::all();
    return view('user_stories', compact('userStories'));
}

    // 🔍 Affiche toutes les User Stories
    public function index()
    {
        $userStories = UserStory::all();
        return response()->json($userStories);
    }

    // ➕ Crée une nouvelle User Story
    public function store(Request $request)
    {
        $validated = $request->validate([
            'project_id' => 'required|integer',
            'titre' => 'required|string|max:255',
            'en_tant_que' => 'required|string',
            'je_veux' => 'required|string',
            'afin_de' => 'required|string',
        ]);

        $userStory = UserStory::create($validated);
        return response()->json($userStory, 201);
    }

    // 📄 Affiche une User Story par ID
    public function show($id)
    {
        $userStory = UserStory::findOrFail($id);
        return response()->json($userStory);
    }

    // 🛠️ Modifie une User Story existante
    public function update(Request $request, $id)
    {
        $userStory = UserStory::findOrFail($id);

        $validated = $request->validate([
            'project_id' => 'required|integer',
            'titre' => 'required|string|max:255',
            'en_tant_que' => 'required|string',
            'je_veux' => 'required|string',
            'afin_de' => 'required|string',
        ]);

        $userStory->update($validated);
        return response()->json($userStory);
    }

    // ❌ Supprime une User Story
    public function destroy($id)
    {
        $userStory = UserStory::findOrFail($id);
        $userStory->delete();

        return response()->json(['message' => 'User Story supprimée avec succès']);
    }
}
