<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skillgroup extends Model
{
    use HasFactory;

    public function projects() {
        return $this->belongsToMany(Project::class, 'project_skillgroups');
    }

    public function skills() {
        return $this->hasMany(Skill::class);
    }
}
