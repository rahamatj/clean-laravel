<?php

namespace CleanLaravel\Modules\Todo\Update;

use App\Models\Todo;
use CleanLaravel\Modules\Todo\Update\Models\RequestModel;

class EntityGateway implements EntityGatewayInterface
{
    public function update(RequestModel $requestModel)
    {
        $todo = Todo::findOrFail($requestModel->id);
        $todo->todo = $requestModel->todo;
        $todo->is_completed = $requestModel->is_completed;

        return $todo->save();
    }
}