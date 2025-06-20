<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use App\Models\UserStory;
use App\Models\Sprint;
use App\Models\Backlog;

class ProjectController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->role === 'developpeur') {
            $projects = $user->projects;
        } else {
            $projects = Project::all();
        }

        return view('projects.index', compact('projects', 'user'));
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

        Project::create($request->all());

        return redirect()->route('projects.index');
    }

    public function show($id)
    {
        $project = Project::findOrFail($id);
        return view('projects.show', compact('project'));
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
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

        $project = Project::findOrFail($id);
        $project->update($request->all());

        return redirect()->route('projects.index');
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()->route('projects.index');
    }

    public function editMembers($id)
    {
        $project = Project::findOrFail($id);
        $users = User::all();

        return view('projects.members', compact('project', 'users'));
    }

    public function updateMembers(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $request->validate([
            'users' => 'required|array',
            'users.*' => 'exists:users,id',
        ]);

        $project->users()->sync($request->users);

        return redirect()->route('projects.show', $project->id)
                         ->with('success', 'Membres mis à jour avec succès.');
    }

    public function membersList($id)
    {
        $project = Project::with('users')->findOrFail($id);
        return view('projects.members_list', compact('project'));
    }

    public function showw($id)
    {
        $project = Project::with('members')->findOrFail($id);
        return view('projects.show', compact('project'));
    }

    public function poDashboard()
    {
        $user = auth()->user();

        if ($user->role !== 'product_owner') {
            abort(403, 'Accès refusé.');
        }

        $projects = Project::where('created_by', $user->id)->get();
        $stories = UserStory::whereIn('project_id', $projects->pluck('id'))->get();

        return view('dashboard.po', [
            'projectsCount' => $projects->count(),
            'storiesCount' => $stories->count(),
            'inProgressStories' => $stories->where('status', 'en cours')->count(),
            'completedStories' => $stories->where('status', 'terminée')->count(),
        ]);
    }

    public function smDashboard()
    {
        $user = auth()->user();

        if ($user->role !== 'scrum_master') {
            abort(403, 'Accès refusé.');
        }

        $projects = $user->projects;

        return view('dashboard.sm', [
            'projectsCount' => $projects->count(),
            'sprintsActifs' => Sprint::where('status', 'en cours')->count(),
            'projects' => $projects,
        ]);
    }

    public function devDashboard()
    {
        $user = auth()->user();

       $assignedStories = $user->userStories; // UserStories qui ont été assignés au développeur
        $assignedBacklogs = $user->backlogs; // Backlogs associés au développeur
        $assignedSprints = $user->sprints; // Sprints associés au développeur
        $projects = $user->projects;

        return view('dashboard.dev', compact(
            'projects',
            'assignedStories',
            'assignedBacklogs',
            'assignedSprints'
        ));
    }

    public function developerProjects()
    {
        $user = auth()->user();
        $projects = $user->projects;

        return view('projects.projet_assigned', compact('projects', 'user'));
    }

    public function developerProjectDetails($projectId)
    {
        $user = auth()->user();

        $project = $user->projects()->where('project_id', $projectId)->firstOrFail();

        return view('dashboard.developer_details', compact('project'));
    }

  public function developerAssignedBacklogs()
{
    $backlogs = auth()->user()->backlogs()->with('sprint')->get();
    return view('dashboard.Backlogs_assignés_dev', compact('backlogs'));
}


}
