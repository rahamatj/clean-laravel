<?php

namespace App\Http\Presenters\Todo;

use CleanLaravel\Modules\Todo\GetAll\Boundaries\OutputBoundary;

class GetAllTodosPresenter implements OutputBoundary
{
    public function respond($response)
    {
        return response()->json([
            'data' => $response
        ]);
    }
}