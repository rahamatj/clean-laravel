<?php

namespace CleanLaravel\Modules\Todo\Store\Boundaries;

use CleanLaravel\Modules\Todo\Store\Models\ResponseModel;

interface OutputBoundary
{
    public function respond(ResponseModel $responseModel);
}