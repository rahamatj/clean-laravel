<?php

namespace App\Http\Controllers;

use App\Http\Presenters\Todo\StoreTodoPresenter;
use CleanLaravel\Modules\Todo\Store\Models\StoreTodoRequestModel;
use CleanLaravel\Modules\Todo\Store\StoreTodoEntityGateway;
use CleanLaravel\Modules\Todo\Store\StoreTodoInteractor;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
