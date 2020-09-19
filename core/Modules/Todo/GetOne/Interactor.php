<?php

namespace CleanLaravel\Modules\Todo\GetOne;

use CleanLaravel\Modules\Todo\GetOne\Boundaries\InputBoundary;
use CleanLaravel\Modules\Todo\GetOne\Boundaries\OutputBoundary;
use CleanLaravel\Modules\Todo\GetOne\Models\RequestModel;
use CleanLaravel\Modules\Todo\GetOne\Models\ResponseModel;

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

    public function getOne(RequestModel $requestModel)
    {
        $todo = $this->entityGateway->getOne($requestModel);

        return $this->outputBoundary->respond($this->makeResponseModel($todo));
    }

    protected function makeResponseModel($todo)
    {
        $responseModel = new ResponseModel();
        $responseModel->id = $todo->id;
        $responseModel->todo = $todo->todo;
        $responseModel->is_completed = $todo->is_completed;
        $responseModel->created_at = $todo->created_at;
        $responseModel->updated_at = $todo->updated_at;

        return $responseModel;
    }
}