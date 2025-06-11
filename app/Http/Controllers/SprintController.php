<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sprint;
use App\Models\UserStory;
use App\Models\Task;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Project;
use App\Models\Backlog;

class SprintController extends Controller
{
    public function index(Request $request)
{
    $projectId = $request->get('project_id');
    $sprints = Sprint::with('project')
        ->when($projectId, function ($query, $projectId) {
            $query->where('project_id', $projectId);
        })->get();

    $projects = Project::all(); // pour afficher dans le select
    return view('sprints.index', compact('sprints', 'projects'));
}



    public function create(Project $project)
{
    $backlogs = $project->backlogs()->whereNull('sprint_id')->get(); // seulement ceux qui ne sont pas encore associés

   return view('sprints.createsprints', compact('project', 'backlogs'));

}



    public function edit(Sprint $sprint)
{
    return view('sprints.editsprint', compact('sprint'));
}


   public function store(Request $request, $projectId)
{
    $request->validate([
    'name' => 'required|string|max:255',
    'start_date' => 'required|date',
    'end_date' => 'required|date|after_or_equal:start_date',
    'objective' => 'required|string',
    ]);

    $sprint = Sprint::create([
    'project_id' => $projectId,
    'name' => $request->name,
    'start_date' => $request->start_date,
    'end_date' => $request->end_date,
    'objective' => $request->objective,
    'status' => 'en attente',
    ]);
    // Associer les backlogs sélectionnés
    if ($request->has('backlog')) {
        Backlog::whereIn('id', $request->backlogs)->update(['sprint_id' => $sprint->id]);
    }
    return redirect()->route('sprints.index')->with('success', 'Sprint créé avec succès.');
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
    $sprint->delete();

    return redirect()->route('sprints.index')->with('success', 'Sprint supprimé avec succès.');
}


// app/Http/Controllers/SprintController.php

public function byProject($projectId)
{
    $sprints = Sprint::where('project_id', $projectId)->get();


    return view('sprints.sprints_by_project', [
        'sprints' => $sprints,
        'projectId' => $projectId,
    ]);
}
}

