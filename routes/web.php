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

$router->get(
    '/',
    [
        'uses' => 'MainController@home',
        'as'   => 'main-home'
    ]
);

$router->get(
    '/categories',
    [
        'uses' => 'CategoryController@list',
        'as'   => 'Category-list'
    ]
);

$router->get(
    '/categories/{id}',
    [
        'uses' => 'CategoryController@edit',
        'as'   => 'Category-edit'
    ]
);
$router->put(
    '/categories/{id}',
    [
        'uses' => 'CategoryController@update',
        'as'   => 'Category-update'
    ]
);
$router->patch(
    '/categories/{id}',
    [
        'uses' => 'CategoryController@patch',
        'as'   => 'Category-patch'
    ]
);
$router->delete(
    '/categories/{id}',
    [
        'uses' => 'CategoryController@delete',
        'as'   => 'Category-delete'
    ]
);
$router->post(
    '/categories',
    [
        'uses' => 'CategoryController@create',
        'as'   => 'Category-create'
    ]
);


$router->get(
    '/tasks',
    [
        'uses' => 'TaskController@list',
        'as'   => 'Task-list'
    ]
);

$router->get(
    '/tasks/{id}',
    [
        'uses' => 'TaskController@edit',
        'as'   => 'task-edit'
    ]
);
$router->put(
    '/tasks/{id}',
    [
        'uses' => 'TaskController@update',
        'as'   => 'Task-update'
    ]
);
$router->patch(
    '/tasks/{id}',
    [
        'uses' => 'TaskController@patch',
        'as'   => 'Task-patch'
    ]
);
$router->delete(
    '/tasks/{id}',
    [
        'uses' => 'TaskController@delete',
        'as'   => 'Task-delete'
    ]
);
$router->post(
    '/tasks',
    [
        'uses' => 'TaskController@create',
        'as'   => 'Task-create'
    ]
);
