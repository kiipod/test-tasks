<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\OrderFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Order
 *
 * @property int $id
 * @property int $order_type_id
 * @property int $partnership_id
 * @property int $user_id
 * @property string $description
 * @property string $date
 * @property string $address
 * @property string $amount
 * @property string $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static OrderFactory factory($count = null, $state = [])
 * @method static Builder<static>|Order newModelQuery()
 * @method static Builder<static>|Order newQuery()
 * @method static Builder<static>|Order query()
 * @method static Builder<static>|Order whereAddress($value)
 * @method static Builder<static>|Order whereAmount($value)
 * @method static Builder<static>|Order whereCreatedAt($value)
 * @method static Builder<static>|Order whereDate($value)
 * @method static Builder<static>|Order whereDescription($value)
 * @method static Builder<static>|Order whereId($value)
 * @method static Builder<static>|Order whereOrderTypeId($value)
 * @method static Builder<static>|Order wherePartnershipId($value)
 * @method static Builder<static>|Order whereStatus($value)
 * @method static Builder<static>|Order whereUpdatedAt($value)
 * @method static Builder<static>|Order whereUserId($value)
 * @mixin Eloquent
 */
class Order extends Model
{
    /** @use HasFactory<OrderFactory> */
    use HasFactory;

    protected $fillable = [
        'order_type_id',
        'partnership_id',
        'user_id',
        'description',
        'date',
        'address',
        'amount',
        'status',
    ];
}
