<?php

// Déclare le namespace où se trouve ce modèle
namespace App\Models;

// Importe la classe Eloquent Model de Laravel
use Illuminate\Database\Eloquent\Model;

// Déclaration du modèle Backlog qui hérite des fonctionnalités d’Eloquent
class Backlog extends Model
{
    // Déclare les colonnes autorisées à être remplies en masse (mass assignable)
    // Cela protège contre les vulnérabilités (ex : éviter que des champs sensibles soient modifiés)
    protected $fillable = [
    'project_id',
    'titre',
    'description',
    'priorite',
    'statut',
    'date_echeance',
    'user_story_id',
];
public function userStory()
{
    return $this->belongsTo(UserStory::class);
}

public function sprint()
{
    return $this->belongsTo(Sprint::class);
}
// app/Models/Backlog.php

public function developer()
{
    return $this->belongsTo(User::class, 'developer_id');
}
public function project()
{
    return $this->belongsTo(Project::class, 'project_id');
}
// app/Models/Backlog.php

// Backlog.php
public function users()
{
    return $this->belongsToMany(User::class, 'backlog_user', 'backlog_id', 'user_id');
}


}
