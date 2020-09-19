<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use CleanLaravel\Modules\Todo\GetAll\Boundaries\InputBoundary as GetAllTodosInputBoundary;
use CleanLaravel\Modules\Todo\GetAll\Interactor as GetAllTodosInteractor;
use CleanLaravel\Modules\Todo\GetAll\EntityGateway as GetAllTodosEntityGateway;
use App\Http\Presenters\Todo\GetAllTodosPresenter;

use CleanLaravel\Modules\Todo\Store\Boundaries\InputBoundary as StoreTodoInputBoundary;
use CleanLaravel\Modules\Todo\Store\Interactor as StoreTodoInteractor;
use CleanLaravel\Modules\Todo\Store\EntityGateway as StoreTodoEntityGateway;
use App\Http\Presenters\Todo\StoreTodoPresenter;

use CleanLaravel\Modules\Todo\GetOne\Boundaries\InputBoundary as GetOneTodoInputBoundary;
use CleanLaravel\Modules\Todo\GetOne\Interactor as GetOneTodoInteractor;
use CleanLaravel\Modules\Todo\GetOne\EntityGateway as GetOneTodoEntityGateway;
use App\Http\Presenters\Todo\GetOneTodoPresenter;

use CleanLaravel\Modules\Todo\Update\Boundaries\InputBoundary as UpdateTodoInputBoundary;
use CleanLaravel\Modules\Todo\Update\Interactor as UpdateTodoInteractor;
use CleanLaravel\Modules\Todo\Update\EntityGateway as UpdateTodoEntityGateway;
use App\Http\Presenters\Todo\UpdateTodoPresenter;

use CleanLaravel\Modules\Todo\Delete\Boundaries\InputBoundary as DeleteTodoInputBoundary;
use CleanLaravel\Modules\Todo\Delete\Interactor as DeleteTodoInteractor;
use CleanLaravel\Modules\Todo\Delete\EntityGateway as DeleteTodoEntityGateway;
use App\Http\Presenters\Todo\DeleteTodoPresenter;

use CleanLaravel\Modules\Todo\ToggleIsCompleted\Boundaries\InputBoundary as ToggleIsCompletedInputBoundary;
use CleanLaravel\Modules\Todo\ToggleIsCompleted\Interactor as ToggleIsCompletedInteractor;
use CleanLaravel\Modules\Todo\ToggleIsCompleted\EntityGateway as ToggleIsCompletedEntityGateway;
use App\Http\Presenters\Todo\ToggleIsCompletedPresenter;

class TodoModuleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(GetAllTodosInputBoundary::class, function () {
            return new GetAllTodosInteractor(
                new GetAllTodosEntityGateway(),
                new GetAllTodosPresenter()
            );
        });

        $this->app->bind(StoreTodoInputBoundary::class, function () {
            return new StoreTodoInteractor(
                new StoreTodoEntityGateway(),
                new StoreTodoPresenter()
            );
        });

        $this->app->bind(GetOneTodoInputBoundary::class, function () {
            return new GetOneTodoInteractor(
                new GetOneTodoEntityGateway(),
                new GetOneTodoPresenter()
            );
        });

        $this->app->bind(UpdateTodoInputBoundary::class, function () {
            return new UpdateTodoInteractor(
                new UpdateTodoEntityGateway(),
                new UpdateTodoPresenter()
            );
        });

        $this->app->bind(DeleteTodoInputBoundary::class, function () {
            return new DeleteTodoInteractor(
                new DeleteTodoEntityGateway(),
                new DeleteTodoPresenter()
            );
        });

        $this->app->bind(ToggleIsCompletedInputBoundary::class, function () {
            return new ToggleIsCompletedInteractor(
                new ToggleIsCompletedEntityGateway(),
                new ToggleIsCompletedPresenter()
            );
        });
    }
}
