<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Projectstatus
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property int|null $order
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Project[] $projects
 * @property-read int|null $projects_count
 * @method static \Illuminate\Database\Eloquent\Builder|Projectstatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Projectstatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Projectstatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|Projectstatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Projectstatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Projectstatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Projectstatus whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Projectstatus whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Projectstatus extends Model
{
    use HasFactory;

    protected $hidden = ['created_at', 'updated_at'];

    public function projects() {
        return $this->hasMany(Project::class, 'projectstatus_id');
    }
}
