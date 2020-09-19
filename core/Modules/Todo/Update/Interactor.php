<?php

namespace CleanLaravel\Modules\Todo\Update;

use CleanLaravel\Modules\Todo\Update\Boundaries\InputBoundary;
use CleanLaravel\Modules\Todo\Update\Boundaries\OutputBoundary;
use CleanLaravel\Modules\Todo\Update\Models\RequestModel;
use CleanLaravel\Modules\Todo\Update\Models\ResponseModel;

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

    public function update(RequestModel $requestModel)
    {
        $this->entityGateway->update($requestModel);

        return $this->outputBoundary->respond($this->makeResponseModel());
    }

    protected function makeResponseModel()
    {
        $responseModel = new ResponseModel();
        $responseModel->message = "Todo updated successfully!";

        return $responseModel;
    }
}