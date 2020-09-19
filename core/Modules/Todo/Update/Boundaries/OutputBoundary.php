<?php

namespace CleanLaravel\Modules\Todo\Update\Boundaries;

use CleanLaravel\Modules\Todo\Update\Models\ResponseModel;

interface OutputBoundary
{
    public function respond(ResponseModel $responseModel);
}