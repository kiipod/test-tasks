<?php

declare(strict_types=1);

namespace App\Services;

use App\DTO\OrderContractorDTO;
use App\DTO\OrderDTO;
use App\Models\Contractor;
use App\Models\Order;
use App\Models\OrderContractor;
use App\Repositories\Interfaces\ContractorRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\CssSelector\Exception\InternalErrorException;

class OrderService
{
    public function __construct(private readonly ContractorRepositoryInterface $contractorRepository)
    {
    }

    /**
     * Метод отвечает за создание нового заказа.
     *
     * @param OrderDTO $orderDto
     * @return Order
     * @throws InternalErrorException
     */
    public function createOrder(OrderDTO $orderDto): Order
    {
        $order = new Order($orderDto->toArray());

        if (! $order->save()) {
            throw new InternalErrorException('The error on the server, please, try again', 500);
        }

        return $order;
    }

    /**
     * Метод отвечает за назначение исполнителя для заказа.
     *
     * @param OrderContractorDTO $dto
     * @return array
     * @throws Exception
     */
    public function assignContractorToOrder(OrderContractorDTO $dto): array
    {
        $order = Order::findOrFail($dto->orderId);

        // Проверяем, что заказ был создан текущим пользователем
        if ($order->user_id !== Auth::id()) {
            throw new Exception('Only the order creator can assign an contractor.');
        }

        $contractor = Contractor::findOrFail($dto->contractorId);

        if ($this->contractorRepository->isContractorExcludedFromOrderType($contractor->id, $order->order_type_id)) {
            throw new Exception('This contractor has refused this type of orders.');
        }

        OrderContractor::create([
            'order_id' => $order->id,
            'contractor_id' => $contractor->id,
            'amount' => $dto->amount,
        ]);

        return [
            'order_id' => $order->id,
            'contractor_id' => $contractor->id,
            'amount' => $dto->amount,
        ];
    }
}
