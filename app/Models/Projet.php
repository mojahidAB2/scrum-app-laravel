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
}
