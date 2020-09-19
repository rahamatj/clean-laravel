<?php

namespace CleanLaravel\Modules\Todo\ToggleIsCompleted;

use App\Models\Todo;
use CleanLaravel\Modules\Todo\ToggleIsCompleted\Models\RequestModel;

class EntityGateway implements EntityGatewayInterface
{
    public function toggle(RequestModel $requestModel)
    {
        $todo = Todo::findOrFail($requestModel->id);
        $todo->is_completed = !$todo->is_completed;
        $todo->save();

        return $todo->is_completed;
    }
}