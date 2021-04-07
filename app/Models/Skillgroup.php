<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Skillgroup
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property int|null $order
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Project[] $projects
 * @property-read int|null $projects_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Skill[] $skills
 * @property-read int|null $skills_count
 * @method static \Illuminate\Database\Eloquent\Builder|Skillgroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Skillgroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Skillgroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|Skillgroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Skillgroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Skillgroup whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Skillgroup whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Skillgroup whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Skillgroup extends Model
{
    use HasFactory;

    protected $hidden = ['created_at', 'updated_at'];

    public function projects() {
        return $this->belongsToMany(Project::class, 'project_skillgroups');
    }

    public function skills() {
        return $this->hasMany(Skill::class);
    }
}
