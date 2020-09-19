<?php

namespace CleanLaravel\Modules\Todo\GetOne;

use CleanLaravel\Modules\Todo\GetOne\Models\RequestModel;

interface EntityGatewayInterface
{
    public function getOne(RequestModel $requestModel);
}