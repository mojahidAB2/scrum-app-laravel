<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';

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

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
