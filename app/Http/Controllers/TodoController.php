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

use Illuminate\Http\Request;

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

        $requestModel = new StoreTodoRequestModel();
        $requestModel->todo = $request->todo;
        $requestModel->is_completed = $request->is_completed ?: false;

        return $interactor->store($requestModel);
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

        $requestModel = new GetOneTodoRequestModel();
        $requestModel->id = $id;

        return $interactor->getOne($requestModel);
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

        $requestModel = new UpdateTodoRequestModel();
        $requestModel->id = $id;
        $requestModel->todo = $request->todo;
        $requestModel->is_completed = $request->is_completed;

        return $interactor->update($requestModel);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
