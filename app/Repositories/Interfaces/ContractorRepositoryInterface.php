<?php

declare(strict_types=1);

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface ContractorRepositoryInterface
{
    public function isContractorExcludedFromOrderType(int $contractorId, int $orderTypeId): bool;

    public function getAvailableContractors(array $orderTypeIds): Collection;
}
