<?php

namespace CleanLaravel\Modules\Todo\ToggleIsCompleted\Boundaries;

use CleanLaravel\Modules\Todo\ToggleIsCompleted\Models\ResponseModel;

interface OutputBoundary
{
    public function respond(ResponseModel $responseModel);
}