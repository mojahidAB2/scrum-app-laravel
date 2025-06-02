<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;
use App\Models\Sprint;
use App\Models\UserStory;

class DashboardController extends Controller
{
   public function index()
{
    $user = auth()->user(); // njiibo user connecté

    $projectsCount = Project::count(); // 3dd total des projets
    $tasksCount = Task::where('user_id', $user->id)->count(); // les tâches dyalo
    $sprintsActifs = Sprint::where('status', 'en cours')->count(); // les sprints actifs

    if ($user->role === 'product_owner') {
        $projects = Project::where('created_by', $user->id)->get(); // les projets dyal had PO
        $stories = UserStory::whereIn('project_id', $projects->pluck('id'))->get(); // les stories dyal had projets

        return view('dashboard.po', [
            'projectsCount' => $projectsCount,
            'tasksCount' => $tasksCount,
            'sprintsActifs' => $sprintsActifs,
            'projects' => $projects, // hadi li makatbanx ! daba kayn
            'storiesCount' => $stories->count(),
            'inProgressStories' => $stories->where('status', 'en cours')->count(),
            'completedStories' => $stories->where('status', 'terminée')->count(),
        ]);
    }

    if ($user->role === 'developer') {
        return view('dashboard.dev', compact('projectsCount', 'tasksCount', 'sprintsActifs'));
    }

    if ($user->role === 'scrum_master') {
        return view('dashboard.sm', compact('projectsCount', 'tasksCount', 'sprintsActifs'));
    }

    return redirect('/choisir-role'); // ila makanch rôle
}
}
