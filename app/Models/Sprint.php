<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sprint extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'project_id',
        'objective',   // ✅ Si tu utilises aussi l'objectif du sprint
        'status'       // ✅ Si tu veux afficher ou filtrer par statut
    ];

    // 🔗 Relation : chaque sprint appartient à un projet
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    // 🔗 Relation : un sprint peut avoir plusieurs backlogs
    public function backlogs()
    {
        return $this->hasMany(Backlog::class);
    }

    // 🔗 Relation : plusieurs développeurs peuvent être assignés à un sprint
    public function users()
    {
        return $this->belongsToMany(User::class, 'sprint_user');
    }
}
