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


}
