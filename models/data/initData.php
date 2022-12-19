<?php

    use app\core\Router;
    use app\models\User;

    if(isset($_SESSION['email'])){
        $userModel = new User;
        $user =$userModel->findUserByEmail($_SESSION['email']);
        foreach($user as $key => $value){
            $$key = $value;    
        }
        $imageDefault = Router::getAsset("image/banner.png");
        $imageURL = Router::getAsset('uploads/').$avatar;        
    }
?>