<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status',
        'user_id',
        'sprint_id',
    ];

    /**
     * Utilisateur assigné à la tâche
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Sprint auquel la tâche est liée
     */
    public function sprint()
    {
        return $this->belongsTo(Sprint::class);
    }

    /**
     * Commentaires polymorphes liés à la tâche
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
