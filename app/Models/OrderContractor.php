<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\OrderContractorFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\OrderContractor
 *
 * @property int $id
 * @property int $order_id
 * @property int $contractor_id
 * @property string $amount
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static OrderContractorFactory factory($count = null, $state = [])
 * @method static Builder<static>|OrderContractor newModelQuery()
 * @method static Builder<static>|OrderContractor newQuery()
 * @method static Builder<static>|OrderContractor query()
 * @method static Builder<static>|OrderContractor whereAmount($value)
 * @method static Builder<static>|OrderContractor whereContractorId($value)
 * @method static Builder<static>|OrderContractor whereCreatedAt($value)
 * @method static Builder<static>|OrderContractor whereId($value)
 * @method static Builder<static>|OrderContractor whereOrderId($value)
 * @method static Builder<static>|OrderContractor whereUpdatedAt($value)
 * @mixin Eloquent
 */
class OrderContractor extends Model
{
    /** @use HasFactory<OrderContractorFactory> */
    use HasFactory;

    protected $fillable = [
        'order_id',
        'contractor_id',
        'amount',
    ];
}
