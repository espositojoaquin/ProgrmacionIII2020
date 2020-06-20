<?php

use Slim\Routing\RouteCollectorProxy;
use App\Controllers\UsersController;
use App\Middleware\BeforeMiddleware;
use App\Middleware\AfterMiddleware;
use App\Middleware\ValidateMiddleware;


return function ($app) {
    $app->group('/usuarios', function (RouteCollectorProxy $group) {
        
        $group->post('/sigin', UsersController::class . ':add');
        $group->post('/login', UsersController::class . ':login');

    
    })->add(new AfterMiddleware());
    
   /* $app->group('/alumnos', function (RouteCollectorProxy $group) {
        $group->get('[/]', AlumnosController::class . ':getAll');
        $group->get('/:id', AlumnosController::class . ':getAll');
        $group->post('[/]', AlumnosController::class . ':add')->add(ValidateMiddleware::class);
        $group->put('/:id', AlumnosController::class . ':getAll')->add(ValidateMiddleware::class);
        $group->delete('/:id', AlumnosController::class . ':getAll');
    })->add(new BeforeMiddleware());

    $app->group('/materias', function (RouteCollectorProxy $group) {
        $group->get('[/]', AlumnosController::class . ':getAll');
        $group->get('/:id', AlumnosController::class . ':getAll');
        $group->post('[/]', AlumnosController::class . ':getAll');
        $group->put('/:id', AlumnosController::class . ':getAll');
        $group->delete('/:id', AlumnosController::class . ':getAll');
    });*/
};