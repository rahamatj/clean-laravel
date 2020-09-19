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

        return $this->outputBoundary->respond($this->makeResponseModel($newTodo));
    }

    protected function makeResponseModel($todo)
    {
        $responseModel = new ResponseModel();
        $responseModel->id = $todo->id;
        $responseModel->todo = $todo->todo;
        $responseModel->is_completed = $todo->is_completed;
        $responseModel->created_at = $todo->created_at;
        $responseModel->updated_at = $todo->updated_at;
        $responseModel->message = "Todo stored successfully!";

        return $responseModel;
    }
}