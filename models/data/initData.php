<?php

use app\core\Router;
use app\models\User;

if(isset($_SESSION['email'])){
    $userModel = new User;

    $user =$userModel->findUserByEmail($_SESSION['email']);
    foreach($user as $key => $value){
        $$key = $value;    
     }
     $imageDefault = Router::getAsset("image/1.jpg");
     $imageURL = "./public/uploads/".$avatar;
    
}



?>