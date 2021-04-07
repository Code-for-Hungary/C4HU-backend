<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Skilllevel
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property int|null $order
 * @method static \Illuminate\Database\Eloquent\Builder|Skilllevel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Skilllevel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Skilllevel query()
 * @method static \Illuminate\Database\Eloquent\Builder|Skilllevel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Skilllevel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Skilllevel whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Skilllevel whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Skilllevel whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Skilllevel extends Model
{
    use HasFactory;

    protected $hidden = ['created_at', 'updated_at'];

}
