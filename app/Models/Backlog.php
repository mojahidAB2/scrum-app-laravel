<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Backlog extends Model
{
    protected $fillable = [
        'project_id', 
        'titre',
        'description',
        'priorite',
        'statut',
        'date_echeance',
    ];
}
