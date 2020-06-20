<?php
use Slim\App;
use App\Middleware\BeforeMiddleware;
use App\Middleware\AfterMiddleware;
use App\Middleware\ValidateMiddleware;


return function (App $app) {
    $app->addBodyParsingMiddleware();

   // $app->add(new BeforeMiddleware());
    $app->add(new AfterMiddleware());
    $app->add(BeforeMiddleware::class);
    $app->add(ValidateMiddleware::class);
    
};