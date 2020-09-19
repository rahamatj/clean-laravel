<?php

namespace CleanLaravel\Modules\Todo\GetOne;

use App\Models\Todo;
use CleanLaravel\Modules\Todo\GetOne\Models\RequestModel;

class EntityGateway implements EntityGatewayInterface
{
    public function getOne(RequestModel $requestModel)
    {
        return Todo::findOrFail($requestModel->id);
    }
}