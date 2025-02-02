<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\Interfaces\ContractorRepositoryInterface;
use Exception;
use Illuminate\Database\Eloquent\Collection;

class ContractorService
{
    /**
     * @param ContractorRepositoryInterface $contractorRepository
     */
    public function __construct(private readonly ContractorRepositoryInterface $contractorRepository)
    {
    }

    /**
     * Фильтруем исполнителей по типам заказов.
     *
     * @param array $orderTypeIds
     * @return Collection
     * @throws Exception
     */
    public function filterContractorsByOrderTypes(array $orderTypeIds): Collection
    {
        $contractors = $this->contractorRepository->getAvailableContractors($orderTypeIds);

        if ($contractors->isEmpty()) {
            throw new Exception('There are no contractors who can fulfill these types of orders.');
        }

        return $contractors;
    }
}
