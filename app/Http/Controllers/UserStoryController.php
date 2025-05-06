<?php

namespace App\Http\Controllers;

use App\Models\UserStory;
use Illuminate\Http\Request;

class UserStoryController extends Controller // Ce contrôleur gère toutes les opérations liées aux User Stories
{
    /**
     * Affiche toutes les User Stories dans une vue Blade (interface web)
     */
    public function showAllView()
    {
        $userStories = UserStory::all(); // Récupère toutes les User Stories
        return view('user_stories', compact('userStories')); // Affiche la vue 'user_stories.blade.php' avec les données
    }

    /**
     * API - Retourne toutes les User Stories en format JSON
     */
    public function index()
    {
        $userStories = UserStory::all();
        return response()->json($userStories);
    }

    /**
     * API - Crée une nouvelle User Story
     */
    public function store(Request $request)
    {
        // Valide les champs obligatoires
        $validated = $request->validate([
            'project_id'    => 'required|integer',
            'titre'         => 'required|string|max:255',
            'en_tant_que'   => 'required|string',
            'je_veux'       => 'required|string',
            'afin_de'       => 'required|string',
        ]);

        // Crée une User Story avec les données validées
        $userStory = UserStory::create($validated);

        // Retourne la nouvelle User Story avec code 201 (Créé)
        return response()->json($userStory, 201);
    }

    /**
     * API - Affiche une User Story spécifique par ID
     */
    public function show($id)
    {
        $userStory = UserStory::findOrFail($id); // Si introuvable, renvoie 404 automatiquement
        return response()->json($userStory);
    }

    /**
     * API - Met à jour une User Story existante
     */
    public function update(Request $request, $id)
    {
        $userStory = UserStory::findOrFail($id); // Recherche la User Story

        // Valide les nouvelles données
        $validated = $request->validate([
            'project_id'    => 'required|integer',
            'titre'         => 'required|string|max:255',
            'en_tant_que'   => 'required|string',
            'je_veux'       => 'required|string',
            'afin_de'       => 'required|string',
        ]);

        // Met à jour la User Story
        $userStory->update($validated);

        // Retourne la User Story mise à jour
        return response()->json($userStory);
    }

    /**
     * API - Supprime une User Story
     */
    public function destroy($id)
    {
        $userStory = UserStory::findOrFail($id); // Recherche
        $userStory->delete(); // Suppression

        // Message de confirmation
        return response()->json(['message' => 'User Story supprimée avec succès']);
    }
}
