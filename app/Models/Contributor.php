<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Contributor
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property string|null $avatar
 * @property string|null $phone
 * @property string|null $description
 * @property string|null $cv_url
 * @property string|null $zip
 * @property string|null $city
 * @property string|null $address
 * @property int $user_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Contract[] $contracts
 * @property-read int|null $contracts_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Skill[] $skills
 * @property-read int|null $skills_count
 * @method static \Illuminate\Database\Eloquent\Builder|Contributor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contributor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contributor query()
 * @method static \Illuminate\Database\Eloquent\Builder|Contributor whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contributor whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contributor whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contributor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contributor whereCvUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contributor whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contributor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contributor whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contributor wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contributor whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contributor whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contributor whereZip($value)
 * @mixin \Eloquent
 * @property-read \App\Models\User $user
 */
class Contributor extends Model
{
    use HasFactory;

    public function contracts() {
        return $this->hasMany(Contract::class, 'contributor_id');
    }

    public function skills() {
        return $this->belongsToMany(Skill::class, 'contributor_skills', 'contributor_id', 'skill_id');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
