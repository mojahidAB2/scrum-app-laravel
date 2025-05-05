<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'vision' => 'required',
            'status' => 'required|in:en_cours,termine,suspendu',
        ]);

        Project::create([
            'name' => $request->name,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'vision' => $request->vision,
            'status' => $request->status,
            'owner_id' => auth()->id(),
        ]);

        return redirect()->route('dashboard')->with('success', 'Projet créé avec succès');
    }

    public function create()
{
    return view('create'); 

}
}