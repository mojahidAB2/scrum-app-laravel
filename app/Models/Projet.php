<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'start_date', 'end_date', 'scrum_master', 'priority', 'project_type', 'main_goals'
    ];
    public function users()
    {
        return $this->belongsToMany(User::class, 'projet_user');
    }
    public function sprints()
{
    return $this->hasMany(Sprint::class, 'project_id');
}
 



  public function userStories()
    {
        return $this->hasMany(UserStory::class);
    }

    // Relation avec les tâches
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }



public function userss()
{
    return $this->belongsToMany(User::class, 'projet_user', 'projet_id', 'user_id');
}

}

