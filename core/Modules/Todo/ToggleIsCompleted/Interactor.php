<?php

namespace CleanLaravel\Modules\Todo\ToggleIsCompleted;

use CleanLaravel\Modules\Todo\ToggleIsCompleted\Boundaries\InputBoundary;
use CleanLaravel\Modules\Todo\ToggleIsCompleted\Boundaries\OutputBoundary;
use CleanLaravel\Modules\Todo\ToggleIsCompleted\Models\RequestModel;
use CleanLaravel\Modules\Todo\ToggleIsCompleted\Models\ResponseModel;

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

    public function toggle(RequestModel $requestModel)
    {
        $isCompleted = $this->entityGateway->toggle($requestModel);

        return $this->outputBoundary->respond($this->makeResponseModel($isCompleted));
    }

    protected function makeResponseModel($isCompleted)
    {
        $responseModel = new ResponseModel();
        $responseModel->message = "Todo marked as incomplete successfully!";

        if ($isCompleted)
            $responseModel->message = "Todo marked as completed successfully!";

        return $responseModel;
    }
}