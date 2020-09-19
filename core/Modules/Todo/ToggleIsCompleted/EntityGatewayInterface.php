<?php

namespace CleanLaravel\Modules\Todo\ToggleIsCompleted;

use CleanLaravel\Modules\Todo\ToggleIsCompleted\Models\RequestModel;

interface EntityGatewayInterface
{
    public function toggle(RequestModel $requestModel);
}