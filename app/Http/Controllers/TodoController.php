<?php

namespace App\Http\Controllers;

use App\Http\Presenters\Todo\GetAllTodosPresenter;
use App\Http\Presenters\Todo\StoreTodoPresenter;
use App\Http\Requests\Todo\Store;
use CleanLaravel\Modules\Todo\GetAll\EntityGateway as GetAllTodosEntityGAteway;
use CleanLaravel\Modules\Todo\GetAll\Interactor as GetAllTodosInteractor;
use CleanLaravel\Modules\Todo\Store\Models\RequestModel as StoreTodoRequestModel;
use CleanLaravel\Modules\Todo\Store\EntityGateway as StoreTodoEntityGateway;
use CleanLaravel\Modules\Todo\Store\Interactor as StoreTodoInteractor;
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
