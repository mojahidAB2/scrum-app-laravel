<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function kanban()
    {
        $tasks = Task::all()->groupBy('status');
        return view('kanban.index', compact('tasks'));
    }

    public function store(Request $request)
    {
        $request->validate(['title' => 'required|string']);
        Task::create(['title' => $request->title]);
        return redirect()->back();
    }

    public function updateStatus(Request $request, Task $task)
    {
        $request->validate(['status' => 'required|in:à faire,en cours,terminé']);
        $task->update(['status' => $request->status]);
        return redirect()->back();
    }
}
