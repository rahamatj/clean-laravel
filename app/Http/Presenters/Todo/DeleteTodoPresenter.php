<?php

namespace App\Http\Presenters\Todo;

use CleanLaravel\Modules\Todo\Delete\Boundaries\OutputBoundary;
use CleanLaravel\Modules\Todo\Delete\Models\ResponseModel;

class DeleteTodoPresenter implements OutputBoundary
{
    public function respond(ResponseModel $responseModel)
    {
        return response()->json([
           'message' => $responseModel->message
        ]);
    }
}