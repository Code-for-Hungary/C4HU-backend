<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    public function project() {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function contributor() {
        return $this->belongsTo(Contributor::class, 'contributor_id');
    }

    public function status() {
        return $this->belongsTo(Contractstatus::class, 'contractstatus_id');
    }
}
