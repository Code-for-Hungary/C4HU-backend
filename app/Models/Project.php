<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Project
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property string|null $description
 * @property string|null $startdate
 * @property string|null $deadline
 * @property string|null $zip
 * @property string|null $city
 * @property string|null $address
 * @property string|null $closedate
 * @property int $projectstatus_id
 * @property int $projectowner_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Category[] $categories
 * @property-read int|null $categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Contract[] $contracts
 * @property-read int|null $contracts_count
 * @property-read \App\Models\Projectowner $owner
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Skillgroup[] $skillgroups
 * @property-read int|null $skillgroups_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Skill[] $skills
 * @property-read int|null $skills_count
 * @property-read \App\Models\Projectstatus $status
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Type[] $types
 * @property-read int|null $types_count
 * @method static \Illuminate\Database\Eloquent\Builder|Project newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project query()
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereClosedate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereDeadline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereProjectownerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereProjectstatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereStartdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereZip($value)
 * @mixin \Eloquent
 */
class Project extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'startdate', 'deadline', 'zip', 'city', 'address'];

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
