<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Skill
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property int|null $order
 * @property int|null $skillgroup_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Contributor[] $contributors
 * @property-read int|null $contributors_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Project[] $projects
 * @property-read int|null $projects_count
 * @property-read \App\Models\Skillgroup|null $skillgroup
 * @method static \Illuminate\Database\Eloquent\Builder|Skill newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Skill newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Skill query()
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereSkillgroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Skill extends Model
{
    use HasFactory;

    protected $hidden = ['created_at', 'updated_at'];
    protected $fillable = ['name', 'order'];

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
