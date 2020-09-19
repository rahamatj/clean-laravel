<?php

namespace App\Http\Presenters\Todo;

use CleanLaravel\Modules\Todo\GetOne\Boundaries\OutputBoundary;
use CleanLaravel\Modules\Todo\GetOne\Models\ResponseModel;
use App\Http\Resources\Todo as TodoResource;

class GetOneTodoPresenter implements OutputBoundary
{
    public function respond(ResponseModel $responseModel)
    {
        return new TodoResource($responseModel);
    }
}