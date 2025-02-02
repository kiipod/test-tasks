<?php

declare(strict_types=1);

namespace App\Http\Controllers\API;

use App\DTO\OrderContractorDTO;
use App\DTO\OrderDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\AssignContractorRequest;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Response\FailResponse;
use App\Http\Response\SuccessResponse;
use App\Services\OrderService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class OrderController extends Controller
{
    /**
     * @param OrderService $orderService
     */
    public function __construct(private readonly OrderService $orderService)
    {
    }

    /**
     * Метод отвечает за создание нового заказа
     *
     * @param StoreOrderRequest $request
     * @return SuccessResponse|FailResponse
     */
    public function store(StoreOrderRequest $request): SuccessResponse|FailResponse
    {
        try {
            $user = auth()->user();

            $orderDto = OrderDTO::fromRequest($request->validated(), $user->id);
            $order = $this->orderService->createOrder($orderDto);

            return new SuccessResponse(data: [
                'message' => 'Order created successfully',
                'order' => $order,
            ]);
        } catch (\Exception) {
            return new FailResponse();
        }
    }

    /**
     * Метод отвечает за назначение исполнителя для заказа
     *
     * @param AssignContractorRequest $request
     * @return SuccessResponse|FailResponse|JsonResponse
     */
    public function assignContractor(AssignContractorRequest $request): SuccessResponse|FailResponse|JsonResponse
    {
        try {
            $orderContractorDTO = OrderContractorDTO::fromRequest($request->validated());
            $order = $this->orderService->assignContractorToOrder($orderContractorDTO);

            return new SuccessResponse(data: [
                'message' => 'Contractor assigned for order successfully',
                'order' => $order,
            ]);
        } catch (ModelNotFoundException) {
            return response()->json([
                'message' => 'Order or contractor not found',
            ], 404);
        } catch (\Exception) {
            return new FailResponse();
        }
    }
}
