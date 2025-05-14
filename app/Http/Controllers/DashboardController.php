<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projet;
use App\Models\Task;
use App\Models\Sprint;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'projectsCount' => Projet::count(),
            'tasksCount' => Task::where('user_id', auth()->id())->count(),
            'sprintsActifs' => Sprint::where('status', 'en cours')->count(),
        ]);
    }
}
