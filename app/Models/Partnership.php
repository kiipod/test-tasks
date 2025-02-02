<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\PartnershipFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Partnership
 *
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static PartnershipFactory factory($count = null, $state = [])
 * @method static Builder<static>|Partnership newModelQuery()
 * @method static Builder<static>|Partnership newQuery()
 * @method static Builder<static>|Partnership query()
 * @method static Builder<static>|Partnership whereCreatedAt($value)
 * @method static Builder<static>|Partnership whereId($value)
 * @method static Builder<static>|Partnership whereName($value)
 * @method static Builder<static>|Partnership whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Partnership extends Model
{
    /** @use HasFactory<PartnershipFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
    ];
}
