<?php

// Le namespace de la classe (structure du projet Laravel)
namespace App\Models;

// Le modèle Eloquent de Laravel
use Illuminate\Database\Eloquent\Model;

// Déclaration du modèle UserStory
class UserStory extends Model
{
    //  Définition des colonnes qui peuvent être assignées en masse
    protected $fillable = [
        'project_id',     // ID du projet lié à cette User Story
        'titre',          // Titre ou nom de la User Story
        'en_tant_que',    // Le rôle de l'utilisateur (ex: "en tant que visiteur")
        'je_veux',        // Ce que l'utilisateur veut faire (ex: "je veux m'inscrire")
        'afin_de',        // Objectif de l'action (ex: "afin d'accéder à mes projets")
    ];
}
