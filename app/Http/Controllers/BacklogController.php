<?php

namespace App\Http\Controllers;

use App\Models\Backlog;
use Illuminate\Http\Request;

class BacklogController extends Controller
{
    /**
     * Afficher la liste des tâches dans une vue (avec filtres, tri et pagination)
     */
    public function showAllView()
    {
        // Préparer la requête sur le modèle Backlog
        $query = Backlog::query();

        //  Si l'utilisateur filtre par priorité (ex: haute, moyenne, faible)
        if (request('priorite')) {
            $query->where('priorite', request('priorite'));
        }

        //  Si l'utilisateur filtre par statut (ex: à faire, en cours, terminé)
        if (request('statut')) {
            $query->where('statut', request('statut'));
        }

        //  Tri par date d'échéance si l'utilisateur choisit (asc ou desc)
        if (request('sort') === 'asc') {
            $query->orderBy('date_echeance', 'asc');
        } elseif (request('sort') === 'desc') {
            $query->orderBy('date_echeance', 'desc');
        }

        //  Pagination des résultats : 5 tâches par page
        $backlogs = $query->paginate(5);

        // 🧷 Garde les filtres dans l'URL même quand on change de page
        $backlogs->appends(request()->query());

        // Retourner la vue Blade avec les données
        return view('backlogs', compact('backlogs'));
    }

    /**
     * API : Retourne tous les backlogs au format JSON
     */
    public function index()
    {
        $backlogs = Backlog::all();
        return response()->json($backlogs);
    }

    /**
     * API : Créer une nouvelle tâche dans le backlog
     */
    public function store(Request $request)
    {
        //  Validation des champs envoyés depuis un formulaire ou API
        $validated = $request->validate([
            'project_id'     => 'required|integer',
            'titre'          => 'required|string|max:255',
            'description'    => 'nullable|string',
            'priorite'       => 'required|in:haute,moyenne,faible',
            'statut'         => 'required|string',
            'date_echeance'  => 'nullable|date',
        ]);

        //  Création de la tâche dans la base de données
        $backlog = Backlog::create($validated);

        //  Réponse JSON avec code 201 (créé avec succès)
        return response()->json($backlog, 201);
    }

    /**
     * API : Afficher une tâche spécifique par son ID
     */
    public function show($id)
    {
        //  Chercher la tâche sinon erreur 404
        $backlog = Backlog::findOrFail($id);
        return response()->json($backlog);
    }

    /**
     * API : Mettre à jour une tâche existante
     */
    public function update(Request $request, $id)
    {
        //  Chercher la tâche à modifier
        $backlog = Backlog::findOrFail($id);

        //  Revalidation des champs avant modification
        $validated = $request->validate([
            'project_id'     => 'required|integer',
            'titre'          => 'required|string|max:255',
            'description'    => 'nullable|string',
            'priorite'       => 'required|in:haute,moyenne,faible',
            'statut'         => 'required|string',
            'date_echeance'  => 'nullable|date',
        ]);

        //  Mise à jour des données dans la base
        $backlog->update($validated);

        //  Réponse JSON avec la tâche mise à jour
        return response()->json($backlog);
    }

    /**
     * API : Supprimer une tâche
     */
    public function destroy($id)
    {
        // 🔍 Vérifie si la tâche existe, sinon erreur 404
        $backlog = Backlog::findOrFail($id);

        // Supprime la tâche
        $backlog->delete();

        //  Réponse JSON de confirmation
        return response()->json(['message' => 'Tâche supprimée avec succès']);
    }
}
