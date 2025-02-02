<?php

declare(strict_types=1);

namespace App\DTO;

use Carbon\Carbon;

class OrderDTO
{
    /**
     * @param int $orderTypeId
     * @param int $partnershipId
     * @param int $userId
     * @param string $description
     * @param Carbon $date
     * @param string $address
     * @param float $amount
     * @param string $status
     */
    public function __construct(
        public int $orderTypeId,
        public int $partnershipId,
        public int $userId,
        public string $description,
        public Carbon $date,
        public string $address,
        public float $amount,
        public string $status = 'created',
    ) {
    }

    /**
     * @param array $data
     * @param int $userId
     * @return self
     */
    public static function fromRequest(array $data, int $userId): self
    {
        return new self(
            orderTypeId: (int) $data['order_type_id'],
            partnershipId: (int) $data['partnership_id'],
            userId: $userId,
            description: $data['description'],
            date: Carbon::parse($data['date']),
            address: $data['address'],
            amount: (float) $data['amount'],
            status: $data['status'] ?? 'created',
        );
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'order_type_id' => $this->orderTypeId,
            'partnership_id' => $this->partnershipId,
            'user_id' => $this->userId,
            'description' => $this->description,
            'date' => $this->date->toDateTimeString(),
            'address' => $this->address,
            'amount' => $this->amount,
            'status' => $this->status,
        ];
    }
}
