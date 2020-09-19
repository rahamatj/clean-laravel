<?php

namespace CleanLaravel\Modules\Todo\GetOne\Boundaries;

use CleanLaravel\Modules\Todo\GetOne\Models\RequestModel;

interface InputBoundary
{
    public function getOne(RequestModel $requestModel);
}