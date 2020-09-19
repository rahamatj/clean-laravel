<?php

namespace CleanLaravel\Modules\Todo\Delete\Boundaries;

use CleanLaravel\Modules\Todo\Delete\Models\ResponseModel;

interface OutputBoundary
{
    public function respond(ResponseModel $responseModel);
}