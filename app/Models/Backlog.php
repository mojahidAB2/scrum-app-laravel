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
        'project_id',      // Référence au projet auquel la tâche est liée
        'titre',           // Titre de la tâche backlog
        'description',     // Détails ou description de la tâche
        'priorite',        // Priorité de la tâche (haute, moyenne, faible)
        'statut',          // Statut de la tâche (ex : à faire, en cours, terminé)
        'date_echeance',   // Date limite pour terminer la tâche
    ];
}
