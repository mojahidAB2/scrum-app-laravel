<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use App\Models\Sprint;
use App\Notifications\TaskAssigned;

class TaskController extends Controller
{
    // Liste des tâches avec relations sprint
    public function index()
    {
        $tasks = Task::with(['sprint', 'user', 'comments.user'])->get();
        return view('tasks.index', compact('tasks'));
    }

    // Vue en mode Kanban
   public function kanban()
{
    $statuses = ['à faire', 'en cours', 'terminé'];
    $tasks = [];

    foreach ($statuses as $status) {
        $tasks[$status] = Task::where('status', $status)
            ->with(['user', 'sprint'])
            ->get();
    }

    return view('kanban.index', compact('tasks'));
}




    // Formulaire de création
    public function create()
    {
        $users = User::all();
        $sprints = Sprint::all();
        return view('tasks.create', compact('users', 'sprints'));
    }

    // Enregistrement d'une tâche
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'nullable|in:à faire,en cours,terminé',
            'user_id' => 'nullable|exists:users,id',
            'sprint_id' => 'nullable|exists:sprints,id',
        ]);

        $task = Task::create($request->all());

        if ($task->user) {
            $task->user->notify(new TaskAssigned($task));
        }

        return redirect()->route('tasks.index')->with('success', 'Tâche créée avec succès.');
    }

    // Formulaire d'édition
    public function edit(Task $task)
    {
        $users = User::all();
        $sprints = Sprint::all();
        return view('tasks.edit', compact('task', 'users', 'sprints'));
    }

    // Mise à jour de la tâche
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'nullable|in:à faire,en cours,terminé',
            'user_id' => 'nullable|exists:users,id',
            'sprint_id' => 'nullable|exists:sprints,id',
        ]);

        $task->update($request->all());

        return redirect()->route('tasks.index')->with('success', 'Tâche mise à jour avec succès.');
    }

    // Suppression
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Tâche supprimée avec succès.');
    }

    // Mise à jour du statut (drag & drop kanban par exemple)
    public function updateStatus(Request $request, Task $task)
    {
        $request->validate(['status' => 'required|in:à faire,en cours,terminé']);
        $task->update(['status' => $request->status]);
        return redirect()->back()->with('success', 'Statut mis à jour.');
    }
    public function show(Task $task)
{
    return view('tasks.show', compact('task'));
}

}
