<?php

namespace CleanLaravel\Modules\Todo\GetAll;

use CleanLaravel\Modules\Todo\GetAll\Boundaries\InputBoundary;
use CleanLaravel\Modules\Todo\GetAll\Boundaries\OutputBoundary;

class Interactor implements InputBoundary
{
    private $entityGateway;
    private $outputBoundary;

    public function __construct(
        EntityGatewayInterface $entityGateway,
        OutputBoundary $outputBoundary
    )
    {
        $this->entityGateway = $entityGateway;
        $this->outputBoundary = $outputBoundary;
    }

    public function getAll()
    {
        $allTodos = $this->entityGateway->getAll();

        return $this->outputBoundary->respond($allTodos);
    }
}