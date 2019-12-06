<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/',                'HomeController@index')->name('admin.home');
    $router->get('auth/information', 'InformationController@index');
    $router->get('auth/request',     'RequestController@index');
    $router->get('auth/comment',     'CommentController@index');

});
