<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sprint extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'start_date', 'end_date', 'project_id'];

public function project()
    {
    return $this->belongsTo(Project::class, 'project_id');
    }
public function backlogs()
    {
    return $this->hasMany(Backlog::class);
    }
public function users()
{
    return $this->belongsToMany(User::class, 'sprint_user');
}
}
