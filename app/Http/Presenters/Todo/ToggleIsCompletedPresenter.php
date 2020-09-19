<?php

namespace App\Http\Presenters\Todo;

use CleanLaravel\Modules\Todo\ToggleIsCompleted\Boundaries\OutputBoundary;
use CleanLaravel\Modules\Todo\ToggleIsCompleted\Models\ResponseModel;

class ToggleIsCompletedPresenter implements OutputBoundary
{
    public function respond(ResponseModel $responseModel)
    {
        return response()->json([
           'message' => $responseModel->message
        ]);
    }
}