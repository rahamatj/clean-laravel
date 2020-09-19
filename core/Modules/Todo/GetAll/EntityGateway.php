<?php

namespace CleanLaravel\Modules\Todo\GetAll;

use App\Models\Todo;

class EntityGateway implements EntityGatewayInterface
{
    public function getAll()
    {
        return Todo::all()->toArray();
    }
}