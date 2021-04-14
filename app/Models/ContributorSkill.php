<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ContributorSkill extends Pivot {

    public function skilllevel() {
        return $this->belongsTo(Skilllevel::class, 'skilllevel_id');
    }
}
