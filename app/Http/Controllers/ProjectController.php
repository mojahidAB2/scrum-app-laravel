<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projet;
use App\Models\User;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Projet::all();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'scrum_master' => 'required|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        projet::create($request->all());

        return redirect()->route('projects.index');
    }

    public function show($id)
    {
        $project = projet::findOrFail($id);
        return view('projects.show', compact('project'));
    }

    public function edit($id)
    {
        $project = projet::findOrFail($id);
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'scrum_master' => 'required|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        $project = projet::findOrFail($id);
        $project->update($request->all());

        return redirect()->route('projects.index');
    }

    public function destroy($id)
    {
        $project = projet::findOrFail($id);
        $project->delete();

        return redirect()->route('projects.index');
    }
    public function editMembers($id)
    {
        $projet = Projet::findOrFail($id);
        $users = User::all();
    
        return view('projects.members', compact('projet', 'users'));
    }
    

// Enregistrer les membres sélectionnés
public function updateMembers(Request $request, $id)
{
    $projet = Projet::findOrFail($id);

    $request->validate([
        'users' => 'required|array',
        'users.*' => 'exists:users,id',
    ]);

    $projet->users()->sync($request->users);

    return redirect()->route('projects.show', $projet->id)
        ->with('success', 'Membres du projet mis à jour avec succès.');
}


}

