<?php

namespace App\Http\Presenters\Todo;

use CleanLaravel\Modules\Todo\Store\Boundaries\OutputBoundary;
use CleanLaravel\Modules\Todo\Store\Models\ResponseModel;
use App\Http\Resources\Todo as TodoResource;

class StoreTodoPresenter implements OutputBoundary
{
    public function respond(ResponseModel $responseModel)
    {
        return new TodoResource($responseModel);
    }
}