<?php

namespace CleanLaravel\Modules\Todo\Store;

use CleanLaravel\Modules\Todo\Store\Boundaries\InputBoundary;
use CleanLaravel\Modules\Todo\Store\Boundaries\OutputBoundary;
use CleanLaravel\Modules\Todo\Store\Models\StoreTodoRequestModel;
use CleanLaravel\Modules\Todo\Store\Models\StoreTodoResponseModel;

class StoreTodoInteractor implements InputBoundary
{
    private $entityGateway;
    private $outputBoundary;

    public function __construct(
        StoreTodoEntityGatewayInterface $entityGateway,
        OutputBoundary $outputBoundary
    )
    {
        $this->entityGateway = $entityGateway;
        $this->outputBoundary = $outputBoundary;
    }

    public function store(StoreTodoRequestModel $requestModel)
    {
        $newTodo = $this->entityGateway->store($requestModel);

        $responseModel = new StoreTodoResponseModel();
        $responseModel->id = $newTodo->id;
        $responseModel->todo = $newTodo->todo;
        $responseModel->is_completed = $newTodo->is_completed;
        $responseModel->created_at = $newTodo->created_at;
        $responseModel->updated_at = $newTodo->updated_at;

        return $this->outputBoundary->respond($responseModel);
    }
}