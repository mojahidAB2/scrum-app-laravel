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
    $user = auth()->user();

    return match($user->role) {
        'product_owner' => redirect()->route('dashboard.po'),
        'scrum_master' => redirect()->route('dashboard.sm'),
        'developer' => redirect()->route('dashboard.dev'),
        default => redirect('/choisir-role'),
    };
}
}

