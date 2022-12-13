<?php

    require_once __DIR__.'/vendor/autoload.php';

use app\controllers\AuthController;
use app\core\Application ;
use app\controllers\SiteController;

    $app = new Application(dirname(__DIR__));

    $app->router->get('/',[SiteController::class,'homepage']);

    $app->router->get('/contact',[SiteController::class,'contact']);

    $app->router->post('/contact',[SiteController::class,'handleContact']);

    $app->router->get('/login',[SiteController::class,'login']);
    $app->router->post('/login',[AuthController::class,'handleLogin']);

    $app->router->get('/register',[SiteController::class,'register']);

    $app->router->post('/register',[AuthController::class,'handleRegister']);

    $app->router->get('/profile',[SiteController::class,'profile']);


    $app->run();
    
?>