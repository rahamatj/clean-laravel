<?php

namespace CleanLaravel\Modules\Todo\Store;

use CleanLaravel\Modules\Todo\Store\Models\StoreTodoRequestModel;

interface StoreTodoEntityGatewayInterface
{
    public function store(StoreTodoRequestModel $requestModel);
}