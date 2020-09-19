<?php

namespace CleanLaravel\Modules\Todo\Delete;

use App\Models\Todo;
use CleanLaravel\Modules\Todo\Delete\Models\RequestModel;

class EntityGateway implements EntityGatewayInterface
{
    public function delete(RequestModel $requestModel)
    {
        $todo = Todo::findOrFail($requestModel->id);

        return $todo->delete();
    }
}