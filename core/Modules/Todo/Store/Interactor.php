<?php

namespace CleanLaravel\Modules\Todo\Store;

use CleanLaravel\Modules\Todo\Store\Boundaries\InputBoundary;
use CleanLaravel\Modules\Todo\Store\Boundaries\OutputBoundary;
use CleanLaravel\Modules\Todo\Store\Models\RequestModel;
use CleanLaravel\Modules\Todo\Store\Models\ResponseModel;

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

    public function store(RequestModel $requestModel)
    {
        $newTodo = $this->entityGateway->store($requestModel);

        $responseModel = new ResponseModel();
        $responseModel->id = $newTodo->id;
        $responseModel->todo = $newTodo->todo;
        $responseModel->is_completed = $newTodo->is_completed;
        $responseModel->created_at = $newTodo->created_at;
        $responseModel->updated_at = $newTodo->updated_at;

        return $this->outputBoundary->respond($responseModel);
    }
}