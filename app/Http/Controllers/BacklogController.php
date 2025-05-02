<?php

namespace App\Http\Controllers;

use App\Models\Backlog;
use Illuminate\Http\Request;

class BacklogController extends Controller
{
    /**
     * 🎯 Afficher la liste des tâches dans une vue (avec filtres, tri et pagination)
     */
    public function showAllView()
    {
        $query = Backlog::query();

        // 🔍 Filtrage par priorité
        if (request('priorite')) {
            $query->where('priorite', request('priorite'));
        }

        // 🔍 Filtrage par statut
        if (request('statut')) {
            $query->where('statut', request('statut'));
        }

        // 📅 Tri par date d'échéance
        if (request('sort') === 'asc') {
            $query->orderBy('date_echeance', 'asc');
        } elseif (request('sort') === 'desc') {
            $query->orderBy('date_echeance', 'desc');
        }

        // 📄 Pagination (5 résultats par page)
        $backlogs = $query->paginate(5);

        // 🔁 Garde les paramètres de filtre lors de la navigation
        $backlogs->appends(request()->query());

        return view('backlogs', compact('backlogs'));
    }

    /**
     * 🔁 Retourne tous les backlogs en JSON (API)
     */
    public function index()
    {
        $backlogs = Backlog::all();
        return response()->json($backlogs);
    }

    /**
     * ➕ Créer une nouvelle tâche
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'project_id'     => 'required|integer',
            'titre'          => 'required|string|max:255',
            'description'    => 'nullable|string',
            'priorite'       => 'required|in:haute,moyenne,faible',
            'statut'         => 'required|string',
            'date_echeance'  => 'nullable|date',
        ]);

        $backlog = Backlog::create($validated);
        return response()->json($backlog, 201);
    }

    /**
     * 📄 Afficher une tâche spécifique par ID (API)
     */
    public function show($id)
    {
        $backlog = Backlog::findOrFail($id);
        return response()->json($backlog);
    }

    /**
     * 🛠️ Modifier une tâche
     */
    public function update(Request $request, $id)
    {
        $backlog = Backlog::findOrFail($id);

        $validated = $request->validate([
            'project_id'     => 'required|integer',
            'titre'          => 'required|string|max:255',
            'description'    => 'nullable|string',
            'priorite'       => 'required|in:haute,moyenne,faible',
            'statut'         => 'required|string',
            'date_echeance'  => 'nullable|date',
        ]);

        $backlog->update($validated);
        return response()->json($backlog);
    }

    /**
     * ❌ Supprimer une tâche
     */
    public function destroy($id)
    {
        $backlog = Backlog::findOrFail($id);
        $backlog->delete();

        return response()->json(['message' => 'Tâche supprimée avec succès']);
    }
}
