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
}
