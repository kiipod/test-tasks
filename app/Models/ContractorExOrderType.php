<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\ContractorExOrderTypeFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\ContractorExOrderType
 *
 * @property int $id
 * @property int $contractor_id
 * @property int $order_type_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static ContractorExOrderTypeFactory factory($count = null, $state = [])
 * @method static Builder<static>|ContractorExOrderType newModelQuery()
 * @method static Builder<static>|ContractorExOrderType newQuery()
 * @method static Builder<static>|ContractorExOrderType query()
 * @method static Builder<static>|ContractorExOrderType whereContractorId($value)
 * @method static Builder<static>|ContractorExOrderType whereCreatedAt($value)
 * @method static Builder<static>|ContractorExOrderType whereId($value)
 * @method static Builder<static>|ContractorExOrderType whereOrderTypeId($value)
 * @method static Builder<static>|ContractorExOrderType whereUpdatedAt($value)
 * @mixin Eloquent
 */
class ContractorExOrderType extends Model
{
    /** @use HasFactory<ContractorExOrderTypeFactory> */
    use HasFactory;

    protected $fillable = [
        'contractor_id',
        'order_type_id',
    ];
}
