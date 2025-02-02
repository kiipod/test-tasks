<?php

declare(strict_types=1);

namespace App\DTO;

class OrderContractorDTO
{
    /**
     * @param int $orderId
     * @param int $contractorId
     * @param float $amount
     */
    public function __construct(
        public int $orderId,
        public int $contractorId,
        public float $amount,
    ) {
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromRequest(array $data): self
    {
        return new self(
            orderId: (int) $data['order_id'],
            contractorId: (int) $data['contractor_id'],
            amount: (float) $data['amount'],
        );
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'order_id' => $this->orderId,
            'contractor_id' => $this->contractorId,
            'amount' => $this->amount,
        ];
    }
}
