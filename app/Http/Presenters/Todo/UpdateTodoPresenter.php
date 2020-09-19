<?php

namespace App\Http\Presenters\Todo;

use CleanLaravel\Modules\Todo\Update\Boundaries\OutputBoundary;
use CleanLaravel\Modules\Todo\Update\Models\ResponseModel;

class UpdateTodoPresenter implements OutputBoundary
{
    public function respond(ResponseModel $responseModel)
    {
        return response()->json([
           'message' => $responseModel->message
        ]);
    }
}