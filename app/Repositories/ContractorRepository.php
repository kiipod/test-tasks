<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Contractor;
use App\Models\ContractorExOrderType;
use App\Repositories\Interfaces\ContractorRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ContractorRepository implements ContractorRepositoryInterface
{
    /**
     * Метод проверяет, исключен ли подрядчик от выполнения заказов указанного типа.
     *
     * @param int $contractorId
     * @param int $orderTypeId
     * @return bool
     */
    public function isContractorExcludedFromOrderType(int $contractorId, int $orderTypeId): bool
    {
        return ContractorExOrderType::where('contractor_id', $contractorId)
            ->where('order_type_id', $orderTypeId)
            ->exists();
    }

    /**
     * Получаем исполнителей, у которых нет записей в contractor_ex_order_types для всех переданных типов заказов.
     *
     * @param array $orderTypeIds
     * @return Collection
     */
    public function getAvailableContractors(array $orderTypeIds): Collection
    {
        // Преобразуем массив в одномерный
        $flattenedOrderTypeIds = array_column($orderTypeIds, 'order_type_id');

        return Contractor::whereDoesntHave('excludedOrderTypes', function ($query) use ($flattenedOrderTypeIds) {
            $query->whereIn('order_type_id', $flattenedOrderTypeIds);
        })
            ->select('id', 'name', 'second_name', 'surname', 'phone')
            ->get();
    }
}
