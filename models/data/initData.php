<?php

use app\models\User;

if(isset($_SESSION['email'])){
    $userModel = new User;

    $user =$userModel->findUserByEmail($_SESSION['email']);
    foreach($user as $key => $value){
        $$key = $value;    
     }
     $imageDefault = "https://static-gcdn.basecdn.net/account/image/background.png";
     $imageURL = "./public/uploads/".$avatar;
    
}



?>