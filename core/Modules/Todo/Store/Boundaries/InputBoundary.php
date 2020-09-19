<?php

namespace CleanLaravel\Modules\Todo\Store\Boundaries;

use CleanLaravel\Modules\Todo\Store\Models\StoreTodoRequestModel;

interface InputBoundary
{
    public function store(StoreTodoRequestModel $requestModel);
}