<?php

namespace CleanLaravel\Modules\Todo\Delete;

use CleanLaravel\Modules\Todo\Delete\Boundaries\InputBoundary;
use CleanLaravel\Modules\Todo\Delete\Boundaries\OutputBoundary;
use CleanLaravel\Modules\Todo\Delete\Models\RequestModel;
use CleanLaravel\Modules\Todo\Delete\Models\ResponseModel;

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

    public function delete(RequestModel $requestModel)
    {
        $this->entityGateway->delete($requestModel);

        $responseModel = new ResponseModel();
        $responseModel->message = "Todo deleted successfully!";

        return $this->outputBoundary->respond($responseModel);
    }
}