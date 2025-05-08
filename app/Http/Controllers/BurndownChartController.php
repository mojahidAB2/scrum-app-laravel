<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Carbon\Carbon;

class BurndownChartController extends Controller
{
    public function index()
    {
        // Simuler un sprint de 7 jours
        $startDate = Carbon::now()->subDays(6)->startOfDay();
        $endDate = Carbon::now()->endOfDay();

        $dates = [];
        $ideal = [];
        $actual = [];

        $totalTasks = Task::count();
        $remaining = $totalTasks;

        for ($date = $startDate->copy(); $date->lte($endDate); $date->addDay()) {
            $dates[] = $date->format('Y-m-d');

            // Ideal line: linear descent
            $ideal[] = $totalTasks - round(($totalTasks / 6) * $date->diffInDays($startDate));

            // Actual line: tasks completed by this date
            $completed = Task::whereNotNull('completed_at')->whereDate('completed_at', '<=', $date)->count();
            $actual[] = $totalTasks - $completed;
        }

        return view('burndown.index', compact('dates', 'ideal', 'actual'));
    }
}
