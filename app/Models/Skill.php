<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    public function skillgroup() {
        return $this->belongsTo(Skillgroup::class, 'skillgroup_id');
    }

    public function projects() {
        return $this->belongsToMany(Project::class, 'project_skillgroups');
    }

    public function contributors() {
        return $this->belongsToMany(Contributor::class, 'contributor_skills');
    }
}
