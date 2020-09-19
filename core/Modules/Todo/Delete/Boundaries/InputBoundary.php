<?php

namespace CleanLaravel\Modules\Todo\Delete\Boundaries;

use CleanLaravel\Modules\Todo\Delete\Models\RequestModel;

interface InputBoundary
{
    public function delete(RequestModel $requestModel);
}