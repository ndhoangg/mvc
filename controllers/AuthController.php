<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\User;

class AuthController extends Controller{

    public $userModel;
    public function __construct()
    {
        $this->userModel = new User;
    }

    
    public function handleLogin(Request $request){
       $data = $request->getBody();
       $user = $this->userModel->findUserByEmail($data['email']);
        
       if(empty($user)){
           echo json_encode(["success"=>false,"message"=>"Email Invalid"]);
        
       }
       elseif($data["password"] != $user->password){
        echo json_encode(["success"=>false,"message"=>"Wrong Password!"]);
        }
        else {
        //     $_SESSION['email'] = $user->email;
        //    return $this->render('profile',$user);
        echo json_encode(["success"=>true]);
        }
          
       }
    

    public function handleRegister(Request $request){
        if($request->isPost()){
            echo "submitted"; 
        }

        return $this->render('register');
}
}

?>