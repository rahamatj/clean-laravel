<?php

namespace App\Http\Controllers;

use CleanLaravel\Modules\Todo\GetAll\Interactor as GetAllTodosInteractor;
use CleanLaravel\Modules\Todo\GetAll\EntityGateway as GetAllTodosEntityGAteway;
use App\Http\Presenters\Todo\GetAllTodosPresenter;

use App\Http\Requests\Todo\Store;
use CleanLaravel\Modules\Todo\Store\Interactor as StoreTodoInteractor;
use CleanLaravel\Modules\Todo\Store\EntityGateway as StoreTodoEntityGateway;
use App\Http\Presenters\Todo\StoreTodoPresenter;
use CleanLaravel\Modules\Todo\Store\Models\RequestModel as StoreTodoRequestModel;

use CleanLaravel\Modules\Todo\GetOne\Interactor as GetOneTodoInteractor;
use CleanLaravel\Modules\Todo\GetOne\EntityGateway as GetOneTodoEntityGateway;
use App\Http\Presenters\Todo\GetOneTodoPresenter;
use CleanLaravel\Modules\Todo\GetOne\Models\RequestModel as GetOneTodoRequestModel;

use App\Http\Requests\Todo\Update;
use CleanLaravel\Modules\Todo\Update\Interactor as UpdateTodoInteractor;
use CleanLaravel\Modules\Todo\Update\EntityGateway as UpdateTodoEntityGateway;
use App\Http\Presenters\Todo\UpdateTodoPresenter;
use CleanLaravel\Modules\Todo\Update\Models\RequestModel as UpdateTodoRequestModel;

use CleanLaravel\Modules\Todo\Delete\Interactor as DeleteTodoInteractor;
use CleanLaravel\Modules\Todo\Delete\EntityGateway as DeleteTodoEntityGateway;
use App\Http\Presenters\Todo\DeleteTodoPresenter;
use CleanLaravel\Modules\Todo\Delete\Models\RequestModel as DeleteTodoRequestModel;

use CleanLaravel\Modules\Todo\ToggleIsCompleted\Interactor as ToggleIsCompletedInteractor;
use CleanLaravel\Modules\Todo\ToggleIsCompleted\EntityGateway as ToggleIsCompletedEntityGateway;
use App\Http\Presenters\Todo\ToggleIsCompletedPresenter;
use CleanLaravel\Modules\Todo\ToggleIsCompleted\Models\RequestModel as ToggleIsCompletedRequestModel;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $interactor = new GetAllTodosInteractor(
            new GetAllTodosEntityGAteway(),
            new GetAllTodosPresenter()
        );

        return $interactor->getAll();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        $interactor = new StoreTodoInteractor(
            new StoreTodoEntityGateway(),
            new StoreTodoPresenter()
        );

        return $interactor->store($this->makeStoreRequestModel($request));
    }

    protected function makeStoreRequestModel(Store $request)
    {
        $requestModel = new StoreTodoRequestModel();
        $requestModel->todo = $request->todo;
        $requestModel->is_completed = $request->is_completed ?: false;

        return $requestModel;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $interactor = new GetOneTodoInteractor(
          new GetOneTodoEntityGateway(),
          new GetOneTodoPresenter()
        );

        return $interactor->getOne($this->makeGetOneTodoRequestModel($id));
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request, $id)
    {
        $interactor = new UpdateTodoInteractor(
          new UpdateTodoEntityGateway(),
          new UpdateTodoPresenter()
        );

        return $interactor->update($this->makeUpdateTodoRequestModel($request, $id));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $interactor = new DeleteTodoInteractor(
            new DeleteTodoEntityGateway(),
            new DeleteTodoPresenter()
        );

        return $interactor->delete($this->makeDeleteTodoRequestModel($id));
    }

    protected function makeDeleteTodoRequestModel($id)
    {
        $requestModel = new DeleteTodoRequestModel();
        $requestModel->id = $id;

        return $requestModel;
    }

    public function toggleIsCompleted($id)
    {
        $interactor = new ToggleIsCompletedInteractor(
            new ToggleIsCompletedEntityGateway(),
            new ToggleIsCompletedPresenter()
        );

        return $interactor->toggle($this->makeToggleIsCompletedRequestModel($id));
    }

    protected function makeToggleIsCompletedRequestModel($id)
    {
        $requestModel = new ToggleIsCompletedRequestModel();
        $requestModel->id = $id;

        return $requestModel;
    }
}
