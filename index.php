<?php
    
    require_once __DIR__.'/vendor/autoload.php';
    define ('SITE_ROOT', realpath(dirname(__FILE__)));
use app\controllers\AuthController;
use app\core\Application ;
use app\controllers\SiteController;

    $app = new Application(dirname(__DIR__));

    
    $app->router->get('/login',[SiteController::class,'login']);
    $app->router->post('/login',[AuthController::class,'handleLogin']);

    $app->router->post('/logout',[AuthController::class,'logout']);

    $app->router->get('/register',[SiteController::class,'register']);
    $app->router->post('/register',[AuthController::class,'handleRegister']);
    $app->router->get('/profile',[SiteController::class,'profile']);

    $app->router->post('/update',[AuthController::class,'update']);
    $app->router->post('/updateavatar',[AuthController::class,'updateAvatar']);


    $app->run();
    
?>