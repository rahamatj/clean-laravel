<?php

namespace App\Http\Presenters\Todo;

use CleanLaravel\Modules\Todo\Store\Boundaries\OutputBoundary;
use CleanLaravel\Modules\Todo\Store\Models\StoreTodoResponseModel;
use App\Http\Resources\Todo as TodoResource;

class StoreTodoPresenter implements OutputBoundary
{
    public function respond(StoreTodoResponseModel $responseModel)
    {
        return new TodoResource($responseModel);
    }
}