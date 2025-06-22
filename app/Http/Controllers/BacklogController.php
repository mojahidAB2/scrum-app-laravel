<?php

namespace App\Http\Controllers;

use App\Models\Backlog;
use App\Models\UserStory;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class BacklogController extends Controller
{
    // 🔹 Afficher tous les backlogs
   public function showAllView()
{
    $backlogs = Backlog::with('userStory')->get();
    $userStories = UserStory::all();
    return view('userstoryetbacklogs.backlogs', compact('backlogs', 'userStories'));
}


    // 🔹 Formulaire d'ajout
 public function create()
{
    $projects = Project::all();
    $userStories = UserStory::all();
    return view('userstoryetbacklogs.create_backlog', compact('projects', 'userStories'));
}

    // 🔹 Enregistrement
    public function store(Request $request)
    {
        $request->validate([
            'project_id' => 'required|numeric',
            'titre' => 'required',
            'description' => 'required',
            'user_story_id' => 'nullable|exists:user_stories,id',
        ]);

        Backlog::create([
            'project_id' => $request->project_id,
            'titre' => $request->titre,
            'description' => $request->description,
            'user_story_id' => $request->user_story_id,
        ]);

        return redirect()->route('backlogs.view')->with('success', 'Backlog ajouté avec succès.');
    }

    // 🔹 Formulaire de modification
    public function edit($id)
    {
        $backlog = Backlog::findOrFail($id);
        $userStories = UserStory::all();
        return view('userstoryetbacklogs.edit_backlog', compact('backlog', 'userStories'));
    }

    // 🔹 Mise à jour
    public function update(Request $request, $id)
{
    $backlog = Backlog::findOrFail($id);
    $backlog->update($request->all());
    return redirect()->route('backlogs.view')->with('success', 'Backlog mis à jour !');
}


    // 🔹 Suppression
    public function destroy($id)
    {
        $backlog = Backlog::findOrFail($id);
        $backlog->delete();

        return redirect()->route('backlogs.view')->with('success', 'Backlog supprimé avec succès.');
    }
   public function byProject($projectId)
{
    $backlogs = Backlog::where('project_id', $projectId)->with('userStory')->get();
    return view('userstoryetbacklogs.backlogs_by_project', compact('backlogs', 'projectId'));
}

public function devIndex()
{
    $backlogs = Backlog::with(['project', 'userStory'])->get(); // ✅ afficher tous les backlogs
    return view('userstoryetbacklogs.dev_index', compact('backlogs'));
}


public function backlogsByProject($projectId)
{
    $project = Project::findOrFail($projectId);

    $backlogs = Backlog::with('userStory')
                ->where('project_id', $projectId)
                ->get();

    return view('userstoryetbacklogs.backlogs_by_project', compact('project', 'backlogs')); // ✅ ضروري تبعت $project
}


public function removeFromSprint($id)
{
    $backlog = Backlog::findOrFail($id);
    $sprintId = $backlog->sprint_id;

    $backlog->sprint_id = null;
    $backlog->save();
     dd('fonction appelée');
   return redirect()->route('sprints.assign.backlog.form', $sprintId)
                     ->with('success', 'Backlog retiré avec succès du sprint.');
}

public function showBacklogFormForDev(User $user)
{
    $backlogs = Backlog::all(); // tu peux aussi filtrer par sprint courant
   $developer = $user;
return view('userstoryetbacklogs.assignadev', compact('developer', 'backlogs'));
}

public function assignBacklogsToDev(Request $request, User $user)
{
    $request->validate([
        'backlogs' => 'required|array',
    ]);

    $user->backlogs()->syncWithoutDetaching($request->backlogs);

    return redirect()->back()->with('success', 'Backlogs assignés à ' . $user->name . ' avec succès !');
}

public function teamManagement()
{
    $developers = User::where('role', 'developer')->get(); // ✅ correct
    return view('userstoryetbacklogs.members', compact('developers'));
}


public function removeBacklogFromDev(User $user, Backlog $backlog)
{
    $user->backlogs()->detach($backlog->id);
    return redirect()->back()->with('success', 'Backlog retiré avec succès.');
}


// 🔹 Formulaire d'assignation des backlogs à un sprint
public function assignBacklogsForm($sprintId)
{
    $backlogs = Backlog::whereNull('sprint_id')->get();
    return view('sprints.assign_backlog', compact('backlogs', 'sprintId'));
}
// 🔹 Assigner les backlogs sélectionnés à un sprint
public function assignBacklogsToSprint(Request $request, $sprintId)
{
    $request->validate([
        'backlogs' => 'required|array'
    ]);

    foreach ($request->backlogs as $backlogId) {
        $backlog = Backlog::find($backlogId);
        if ($backlog) {
            $backlog->sprint_id = $sprintId;
            $backlog->save();
        }
    }

    return redirect()->route('sprints.index')->with('success', 'Backlogs assignés avec succès au sprint.');
}

 public function developerAssignedBacklogs()
{
    $backlogs = auth()->user()->backlogs()->with('sprint')->get();
    return view('dashboard.Backlogs_assignés_dev', compact('backlogs'));
}

public function updateStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:en cours,terminé,bloqué',
    ]);

    $user = auth()->user(); // l'utilisateur connecté (développeur)

    // met à jour le champ "status" dans la table backlog_user
    $user->backlogs()->updateExistingPivot($id, [
        'status' => $request->status
    ]);

    return redirect()->back()->with('success', 'Statut du backlog mis à jour avec succès.');
}


}
