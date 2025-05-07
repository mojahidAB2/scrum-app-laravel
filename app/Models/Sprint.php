<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sprint extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'start_date', 'end_date', 'project_id'];

    public function projet()
    {
        return $this->belongsTo(Projet::class, 'project_id');
    }
}
