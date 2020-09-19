<?php

namespace CleanLaravel\Modules\Todo\Store;

use CleanLaravel\Modules\Todo\Store\Models\RequestModel;

interface EntityGatewayInterface
{
    public function store(RequestModel $requestModel);
}