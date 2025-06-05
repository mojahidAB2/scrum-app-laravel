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
    return $this->belongsToMany(Project::class, 'project_user');
}
}
