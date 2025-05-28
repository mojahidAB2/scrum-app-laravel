<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
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

        project::create($request->all());

        return redirect()->route('projects.index');
    }

    public function show($id)
    {
        $project = project::findOrFail($id);
        return view('projects.show', compact('project'));
    }

    public function edit($id)
    {
        $project = project::findOrFail($id);
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

        $project = project::findOrFail($id);
        $project->update($request->all());

        return redirect()->route('projects.index');
    }

    public function destroy($id)
    {
        $project = project::findOrFail($id);
        $project->delete();

        return redirect()->route('projects.index');
    }
    public function editMembers($id)
    {
        $project = project::findOrFail($id);
        $users = User::all();

        return view('projects.members', compact('project', 'users'));
    }


// Enregistrer les membres sélectionnés
public function updateMembers(Request $request, $id)
{
    $project = project::findOrFail($id);

    $request->validate([
        'users' => 'required|array',
        'users.*' => 'exists:users,id',
    ]);

    // Enregistre tous les utilisateurs sélectionnés
    $project->users()->sync($request->users);

    return redirect()->route('projects.show', $project->id)
                     ->with('success', 'Membres mis à jour avec succès.');
}

public function membersList($id)
{
    $project = project::with('users')->findOrFail($id);
    return view('projects.members_list', compact('project'));
}
// ProjectController.php

public function showw($id)
{
    $project = Project::with('members')->findOrFail($id);
    return view('projects.show', compact('project'));
}

}



