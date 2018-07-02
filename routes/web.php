<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
$router->get('/', function () use ($router) {
    return $router->app->version();
});

//$app->group(['prefix' => 'api/'], function ($app) {
//    $app->get('login/', 'UsersController@authenticate');
//});

$router->post('api/register', 'UserController@register');
$router->post('api/login', ['middleware'=>'auth','uses' =>'UserController@login']);

$router->post('api/{id}','TodoController@add');
$router->delete('api/{id}', 'ToDoController@deleteTask');
$router->get('api/{user_id}', 'ToDoController@viewtask');
$router->put('api/{id}', 'ToDoController@updatetask');

$router->get('tasks', 'TasksController@index');
$router->get('tasks/{id}', 'TasksController@show');
$router->put('tasks/{id}', 'TasksController@update');
$router->post('tasks', 'TasksController@store');
$router->delete('tasks/{id}', 'TasksController@destroy');

//$this->app->bind("app\Todolist", function (){
//        return new app\Todolist(config('services.facebook'));
//
//});