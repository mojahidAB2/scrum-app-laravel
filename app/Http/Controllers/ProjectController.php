<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use App\Models\UserStory;

class ProjectController extends Controller
{
    // Affiche tous les projets
    public function index()
    {
        $projects = Project::all(); // Récupère tous les projets
        return view('projects.index', compact('projects')); // Affiche la vue avec les projets
    }

    // Affiche le formulaire de création
    public function create()
    {
        return view('projects.create'); // Affiche la vue du formulaire de création de projet
    }

    // Enregistre un nouveau projet
    public function store(Request $request)
    {
        // Valide les données du formulaire
        $request->validate([
            'name' => 'required|max:255',
            'scrum_master' => 'required|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        Project::create($request->all()); // Crée un nouveau projet avec les données reçues

        return redirect()->route('projects.index'); // Redirige vers la liste des projets
    }

    // Affiche un projet en détail
    public function show($id)
    {
        $project = Project::findOrFail($id); // Récupère le projet ou renvoie une erreur 404
        return view('projects.show', compact('project'));
    }

    // Affiche le formulaire de modification
    public function edit($id)
    {
        $project = Project::findOrFail($id); // Récupère le projet à modifier
        return view('projects.edit', compact('project'));
    }

    // Met à jour un projet existant
    public function update(Request $request, $id)
    {
        // Valide les données modifiées
        $request->validate([
            'name' => 'required|max:255',
            'scrum_master' => 'required|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        $project = Project::findOrFail($id); // Trouve le projet
        $project->update($request->all()); // Met à jour avec les nouvelles données

        return redirect()->route('projects.index'); // Retour à la liste
    }

    // Supprime un projet
    public function destroy($id)
    {
        $project = Project::findOrFail($id); // Trouve le projet
        $project->delete(); // Supprime

        return redirect()->route('projects.index'); // Retour liste
    }

    // Affiche le formulaire d'édition des membres du projet
    public function editMembers($id)
    {
        $project = Project::findOrFail($id); // Projet concerné
        $users = User::all(); // Tous les utilisateurs

        return view('projects.members', compact('project', 'users'));
    }

    // Met à jour les membres du projet
    public function updateMembers(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $request->validate([
            'users' => 'required|array',
            'users.*' => 'exists:users,id', // Chaque user doit exister
        ]);

        $project->users()->sync($request->users); // Synchro des membres du projet

        return redirect()->route('projects.show', $project->id)
                         ->with('success', 'Membres mis à jour avec succès.');
    }

    // Liste des membres d'un projet
    public function membersList($id)
    {
        $project = Project::with('users')->findOrFail($id); // Projet avec relation users
        return view('projects.members_list', compact('project'));
    }
    
    // Affiche le projet avec ses membres (doublon possible avec show)
    public function showw($id)
    {
        $project = Project::with('members')->findOrFail($id);
        return view('projects.show', compact('project'));
    }

    // Dashboard du Product Owner avec stats
    public function poDashboard()
    {
        $user = auth()->user();

        $projects = Project::where('created_by', $user->id)->get();
        $stories = UserStory::whereIn('project_id', $projects->pluck('id'))->get();

        return view('dashboard.po', [
            'projectsCount' => $projects->count(),
            'storiesCount' => $stories->count(),
            'inProgressStories' => $stories->where('status', 'en cours')->count(),
            'completedStories' => $stories->where('status', 'terminée')->count(),
        ]);
    }
}
