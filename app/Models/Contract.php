<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Contract
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $project_id
 * @property int $contributor_id
 * @property int $contractstatus_id
 * @property string|null $startdate
 * @property string|null $enddate
 * @property int $classified
 * @property-read \App\Models\Contributor $contributor
 * @property-read \App\Models\Project $project
 * @property-read \App\Models\Contractstatus $status
 * @method static \Illuminate\Database\Eloquent\Builder|Contract newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contract newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contract query()
 * @method static \Illuminate\Database\Eloquent\Builder|Contract whereClassified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contract whereContractstatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contract whereContributorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contract whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contract whereEnddate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contract whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contract whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contract whereStartdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contract whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
