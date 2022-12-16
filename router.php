<?php

use app\controllers\LoginController;
use app\controllers\RegisterController;
use app\controllers\ProfileController;
use app\core\Application ;

$app = new Application(dirname(__DIR__));



$app->router->get('/login',[LoginController::class,'login']);
$app->router->post('/login',[LoginController::class,'handleLogin']);

$app->router->get('/register',[RegisterController::class,'register']);
$app->router->post('/register',[RegisterController::class,'handleRegister']);

$app->router->get('/profile',[ProfileController::class,'profile']);
$app->router->post('/logout',[ProfileController::class,'logout']);
$app->router->post('/update',[ProfileController::class,'update']);
$app->router->post('/updateavatar',[ProfileController::class,'updateAvatar']);


?>