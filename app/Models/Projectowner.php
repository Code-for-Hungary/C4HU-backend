<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Projectowner
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property string|null $description
 * @property string|null $website
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Project[] $projects
 * @property-read int|null $projects_count
 * @method static \Illuminate\Database\Eloquent\Builder|Projectowner newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Projectowner newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Projectowner query()
 * @method static \Illuminate\Database\Eloquent\Builder|Projectowner whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Projectowner whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Projectowner whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Projectowner whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Projectowner whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Projectowner whereWebsite($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 * @property-read \App\Models\User|null $user
 */
class Projectowner extends Model
{
    use HasFactory;

    protected $hidden = ['created_at', 'updated_at'];
    protected $fillable = ['name', 'description', 'website'];

    public function projects() {
        return $this->hasMany(Project::class, 'projectowner_id');
    }

    public function users() {
        return $this->belongsToMany(User::class, 'projectowner_users', 'projectowner_id', 'user_id');
    }

    public function user() {
        return $this->morphOne(User::class, 'userable');
    }
}
