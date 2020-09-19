<?php

namespace CleanLaravel\Modules\Todo\ToggleIsCompleted\Boundaries;

use CleanLaravel\Modules\Todo\ToggleIsCompleted\Models\RequestModel;

interface InputBoundary
{
    public function toggle(RequestModel $requestModel);
}