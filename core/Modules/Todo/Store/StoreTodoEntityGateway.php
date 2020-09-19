<?php

namespace CleanLaravel\Modules\Todo\Store;

use App\Models\Todo;
use CleanLaravel\Modules\Todo\Store\Models\StoreTodoRequestModel;

class StoreTodoEntityGateway implements StoreTodoEntityGatewayInterface
{
    public function store(StoreTodoRequestModel $requestModel)
    {
        $newTodo = new Todo();
        $newTodo->todo = $requestModel->todo;
        $newTodo->is_completed = $requestModel->is_completed;
        $newTodo->save();

        return $newTodo;
    }
}