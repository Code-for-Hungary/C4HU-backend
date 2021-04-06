<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projectowner extends Model
{
    use HasFactory;

    public function projects() {
        return $this->hasMany(Project::class, 'projectowner_id');
    }
}
