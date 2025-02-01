<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\ContractorFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Contractor
 *
 * @property int $id
 * @property string $name
 * @property string|null $second_name
 * @property string $surname
 * @property string $phone
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static ContractorFactory factory($count = null, $state = [])
 * @method static Builder<static>|Contractor newModelQuery()
 * @method static Builder<static>|Contractor newQuery()
 * @method static Builder<static>|Contractor query()
 * @method static Builder<static>|Contractor whereCreatedAt($value)
 * @method static Builder<static>|Contractor whereId($value)
 * @method static Builder<static>|Contractor whereName($value)
 * @method static Builder<static>|Contractor wherePhone($value)
 * @method static Builder<static>|Contractor whereSecondName($value)
 * @method static Builder<static>|Contractor whereSurname($value)
 * @method static Builder<static>|Contractor whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Contractor extends Model
{
    /** @use HasFactory<ContractorFactory> */
    use HasFactory;
}
