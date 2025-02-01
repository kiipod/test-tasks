<?php

declare(strict_types=1);

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\OrderType
 *
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder<static>|OrderType newModelQuery()
 * @method static Builder<static>|OrderType newQuery()
 * @method static Builder<static>|OrderType query()
 * @method static Builder<static>|OrderType whereCreatedAt($value)
 * @method static Builder<static>|OrderType whereId($value)
 * @method static Builder<static>|OrderType whereName($value)
 * @method static Builder<static>|OrderType whereUpdatedAt($value)
 * @mixin Eloquent
 */
class OrderType extends Model
{
}
