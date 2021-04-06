<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contributor extends Model
{
    use HasFactory;

    public function contracts() {
        return $this->hasMany(Contract::class, 'contributor_id');
    }

    public function skills() {
        return $this->belongsToMany(Skill::class, 'contributor_skills', 'contributor_id', 'skill_id');
    }
}
