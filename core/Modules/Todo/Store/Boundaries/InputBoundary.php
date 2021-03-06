<?php

namespace CleanLaravel\Modules\Todo\Store\Boundaries;

use CleanLaravel\Modules\Todo\Store\Models\RequestModel;

interface InputBoundary
{
    public function store(RequestModel $requestModel);
}