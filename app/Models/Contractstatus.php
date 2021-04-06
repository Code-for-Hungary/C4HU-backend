<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Contractstatus
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property int|null $order
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Contract[] $contracts
 * @property-read int|null $contracts_count
 * @method static \Illuminate\Database\Eloquent\Builder|Contractstatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contractstatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contractstatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|Contractstatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contractstatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contractstatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contractstatus whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contractstatus whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Contractstatus extends Model
{
    use HasFactory;

    public function contracts() {
        return $this->hasMany(Contract::class, 'contractstatus_id');
    }
}
