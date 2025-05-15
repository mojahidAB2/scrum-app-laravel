<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserStory extends Model
{
    protected $fillable = [
        'project_id',
        'titre',
        'en_tant_que',
        'je_veux',
        'afin_de',
    ];

    // 🔹 Commentaires (polymorphique)
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    // 🔹 Relation avec Projet
    public function project()
    {
        return $this->belongsTo(Projet::class, 'project_id');
    }
}
