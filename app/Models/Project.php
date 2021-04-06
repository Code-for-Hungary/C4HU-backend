<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function categories() {
        return $this->belongsToMany(Category::class, 'project_categories', 'project_id', 'category_id');
    }

    public function types() {
        return $this->belongsToMany(Type::class, 'project_types', 'project_id', 'type_id');
    }

    public function skillgroups() {
        return $this->belongsToMany(Skillgroup::class, 'project_skillgroups', 'project_id', 'skillgroup_id');
    }

    public function skills() {
        return $this->belongsToMany(Skill::class, 'project_skills', 'project_id', 'skill_id');
    }

    public function status() {
        return $this->belongsTo(Projectstatus::class, 'projectstatus_id');
    }

    public function owner() {
        return $this->belongsTo(Projectowner::class, 'projectowner_id');
    }

    public function contracts() {
        return $this->hasMany(Contract::class, 'project_id');
    }
}
