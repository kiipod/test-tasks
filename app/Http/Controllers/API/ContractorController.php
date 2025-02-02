<?php

declare(strict_types=1);

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\FilterByOrderTypeIdRequest;
use App\Http\Response\FailResponse;
use App\Http\Response\SuccessResponse;
use App\Services\ContractorService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class ContractorController extends Controller
{
    /**
     * @param ContractorService $contractorService
     */
    public function __construct(private readonly ContractorService $contractorService)
    {
    }

    /**
     * Метод отвечает за фильтрацию исполнителей по типу заказа
     *
     * @param FilterByOrderTypeIdRequest $request
     * @return SuccessResponse|FailResponse|JsonResponse
     */
    public function filterByOrderTypes(FilterByOrderTypeIdRequest $request): SuccessResponse|FailResponse|JsonResponse
    {
        try {
            $orderTypeIds = $request->validated();
            $contractors = $this->contractorService->filterContractorsByOrderTypes($orderTypeIds);

            return new SuccessResponse(data: [
                'message' => 'Contractors found.',
                'contractors' => $contractors,
            ]);
        } catch (ModelNotFoundException) {
            return response()->json([
                'message' => 'TypeId not found.',
            ], 404);
        } catch (\Exception) {
            return new FailResponse();
        }
    }
}
