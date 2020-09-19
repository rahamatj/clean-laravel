<?php

namespace CleanLaravel\Modules\Todo\Delete;

use CleanLaravel\Modules\Todo\Delete\Models\RequestModel;

interface EntityGatewayInterface
{
    public function delete(RequestModel $requestModel);
}