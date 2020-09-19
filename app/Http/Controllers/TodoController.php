<?php

namespace App\Http\Controllers;

use CleanLaravel\Modules\Todo\GetAll\Boundaries\InputBoundary as GetAllTodosInputBoundary;

use App\Http\Requests\Todo\Store;
use CleanLaravel\Modules\Todo\Store\Boundaries\InputBoundary as StoreTodoInputBoundary;
use CleanLaravel\Modules\Todo\Store\Models\RequestModel as StoreTodoRequestModel;

use CleanLaravel\Modules\Todo\GetOne\Boundaries\InputBoundary as GetOneTodoInputBoundary;
use CleanLaravel\Modules\Todo\GetOne\Models\RequestModel as GetOneTodoRequestModel;

use App\Http\Requests\Todo\Update;
use CleanLaravel\Modules\Todo\Update\Boundaries\InputBoundary as UpdateTodoInputBoundary;
use CleanLaravel\Modules\Todo\Update\Models\RequestModel as UpdateTodoRequestModel;

use CleanLaravel\Modules\Todo\Delete\Boundaries\InputBoundary as DeleteTodoInputBoundary;
use CleanLaravel\Modules\Todo\Delete\Models\RequestModel as DeleteTodoRequestModel;

use CleanLaravel\Modules\Todo\ToggleIsCompleted\Boundaries\InputBoundary as ToggleIsCompletedInputBoundary;
use CleanLaravel\Modules\Todo\ToggleIsCompleted\Models\RequestModel as ToggleIsCompletedRequestModel;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param GetAllTodosInputBoundary $inputBoundary
     * @return \Illuminate\Http\Response
     */
    public function index(GetAllTodosInputBoundary $inputBoundary)
    {
        return $inputBoundary->getAll();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Store $request
     * @param StoreTodoInputBoundary $inputBoundary
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request, StoreTodoInputBoundary $inputBoundary)
    {
        return $inputBoundary->store($this->makeStoreRequestModel($request));
    }

    protected function makeStoreRequestModel(Store $request)
    {
        $requestModel = new StoreTodoRequestModel();
        $requestModel->todo = $request->todo;

        return $requestModel;
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @param GetAllTodosInputBoundary $inputBoundary
     * @return \Illuminate\Http\Response
     */
    public function show($id, GetOneTodoInputBoundary $inputBoundary)
    {
        return $inputBoundary->getOne($this->makeGetOneTodoRequestModel($id));
    }

    protected function makeGetOneTodoRequestModel($id)
    {
        $requestModel = new GetOneTodoRequestModel();
        $requestModel->id = $id;

        return $requestModel;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Update $request
     * @param int $id
     * @param UpdateTodoInputBoundary $inputBoundary
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request, $id, UpdateTodoInputBoundary $inputBoundary)
    {
        return $inputBoundary->update($this->makeUpdateTodoRequestModel($request, $id));
    }

    protected function makeUpdateTodoRequestModel(Update $request, $id)
    {
        $requestModel = new UpdateTodoRequestModel();
        $requestModel->id = $id;
        $requestModel->todo = $request->todo;
        $requestModel->is_completed = $request->is_completed;

        return $requestModel;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @param DeleteTodoInputBoundary $inputBoundary
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, DeleteTodoInputBoundary $inputBoundary)
    {
        return $inputBoundary->delete($this->makeDeleteTodoRequestModel($id));
    }

    protected function makeDeleteTodoRequestModel($id)
    {
        $requestModel = new DeleteTodoRequestModel();
        $requestModel->id = $id;

        return $requestModel;
    }

    /**
     * @param $id
     * @param ToggleIsCompletedInputBoundary $inputBoundary
     * @return mixed
     */
    public function toggleIsCompleted($id, ToggleIsCompletedInputBoundary $inputBoundary)
    {
        return $inputBoundary->toggle($this->makeToggleIsCompletedRequestModel($id));
    }

    protected function makeToggleIsCompletedRequestModel($id)
    {
        $requestModel = new ToggleIsCompletedRequestModel();
        $requestModel->id = $id;

        return $requestModel;
    }
}
