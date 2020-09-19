<?php

namespace CleanLaravel\Modules\Todo\GetAll\Boundaries;

interface OutputBoundary
{
    public function respond(array $response);
}