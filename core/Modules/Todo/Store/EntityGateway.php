<?php

namespace CleanLaravel\Modules\Todo\Store;

use App\Models\Todo;
use CleanLaravel\Modules\Todo\Store\Models\RequestModel;

class EntityGateway implements EntityGatewayInterface
{
    public function store(RequestModel $requestModel)
    {
        $newTodo = new Todo();
        $newTodo->todo = $requestModel->todo;
        $newTodo->is_completed = false;
        $newTodo->save();

        return $newTodo;
    }
}