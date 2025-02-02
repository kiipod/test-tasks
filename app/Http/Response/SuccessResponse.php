<?php

declare(strict_types=1);

namespace App\Http\Response;

class SuccessResponse extends BaseResponse
{
    /**
     * @return array|null
     */
    protected function makeResponseData(): ?array
    {
        return ['data' => $this->prepareData()];
    }
}
