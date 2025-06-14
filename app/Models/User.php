<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable // ✅ Ajouté ici
{
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'phone', 'password'];


    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
{
    return [
        'password' => 'hashed',
    ];
}

   public function projects()
{
    return $this->belongsToMany(Project::class, 'project_user', 'user_id', 'project_id');
    // si t'as une table intermédiaire project_user
}
public function userStories()
{
    return $this->belongsToMany(UserStory::class, 'developer_user_story', 'user_id', 'user_story_id');
}
public function backlogs()
{
    return $this->hasMany(Backlog::class, 'developer_id');
}

public function sprints()
{
    return $this->belongsToMany(Sprint::class, 'sprint_user');
}


}
