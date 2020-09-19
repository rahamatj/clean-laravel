<?php

namespace CleanLaravel\Modules\Todo\Update;

use CleanLaravel\Modules\Todo\Update\Models\RequestModel;

interface EntityGatewayInterface
{
    public function update(RequestModel $requestModel);
}