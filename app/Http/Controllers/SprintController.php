<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projet;
use App\Models\Sprint;
use App\Models\UserStory;
use App\Models\Task;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class SprintController extends Controller
{
    public function index(): View
    {
        $sprints = Sprint::with('projet')->get();
        return view('sprints.index', compact('sprints'));
    }


    public function create($projectId)
    {
        $project = Projet::findOrFail($projectId);
        return view('sprints.createsprints', compact('project'));
    }

    public function edit(Sprint $sprint)
{
    return view('sprints.editsprint', compact('sprint'));
}


    public function store(Request $request, Projet $project)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $project->sprints()->create($request->only(['name', 'start_date', 'end_date']));

        return redirect()->route('projects.show', $project->id)->with('success', 'Sprint créé avec succès');
    }

    public function update(Request $request, Sprint $sprint)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
    ]);

    $sprint->update($request->only(['name', 'start_date', 'end_date']));

    return redirect()->route('projects.show', $sprint->project_id)->with('success', 'Sprint mis à jour avec succès');
}
public function destroy(Sprint $sprint)
{
    // Supprimer le sprint
    $sprint->delete();

    // Rediriger avec un message de succès
    return redirect()->route('projects.show', $sprint->project_id)
                     ->with('success', 'Sprint supprimé avec succès');
}
}

