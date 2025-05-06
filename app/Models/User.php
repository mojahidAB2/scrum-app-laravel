<?php

namespace App\Models;

// Modèle User Laravel (authentification utilisateur)
// use Illuminate\Contracts\Auth\MustVerifyEmail; // Décommenter si tu actives la vérification d'email
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

// Ce modèle représente un utilisateur de l'application
class User extends Authenticatable
{
    // Traits pour activer la génération de données factices et les notifications
    use HasFactory, Notifiable;

    /**
     *  Déclare les attributs qui peuvent être modifiés en masse (mass assignable)
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',      // Nom de l'utilisateur
        'email',     // Adresse email
        'password',  // Mot de passe (sera hashé)
    ];

    /**
     *  Attributs à cacher lorsqu'on sérialise l'utilisateur (ex: JSON)
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',         // On ne veut jamais renvoyer le mot de passe brut
        'remember_token',   // Jeton utilisé par Laravel pour "remember me"
    ];

    /**
     * Définir les types des champs (casts) pour les transformer automatiquement
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime', // Transforme ce champ en objet DateTime
            'password' => 'hashed',            // Hash automatique du mot de passe (Laravel 10+)
        ];
    }
}
