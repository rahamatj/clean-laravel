<?php

namespace CleanLaravel\Modules\Todo\Update\Boundaries;

use CleanLaravel\Modules\Todo\Update\Models\RequestModel;

interface InputBoundary
{
    public function update(RequestModel $requestModel);
}