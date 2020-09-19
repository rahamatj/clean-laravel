<?php

namespace CleanLaravel\Modules\Todo\Store\Boundaries;

use CleanLaravel\Modules\Todo\Store\Models\StoreTodoResponseModel;

interface OutputBoundary
{
    public function respond(StoreTodoResponseModel $responseModel);
}