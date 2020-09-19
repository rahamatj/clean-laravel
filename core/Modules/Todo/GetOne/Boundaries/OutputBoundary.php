<?php

namespace CleanLaravel\Modules\Todo\GetOne\Boundaries;

use CleanLaravel\Modules\Todo\GetOne\Models\ResponseModel;

interface OutputBoundary
{
    public function respond(ResponseModel $responseModel);
}