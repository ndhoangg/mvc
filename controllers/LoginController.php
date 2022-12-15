<?php
namespace app\controllers;
use app\core\Controller;
use app\core\Request;
use app\models\User;
    class LoginController extends Controller{

        
        //Render Login
        public function login(){       
            return $this->render('login'); 
        }


        //Handle Login
        public function handleLogin(Request $request){
            $data = $request->getBody();
            $user = $this->userModel->findUserByEmail($data['email']);
         
            if(empty($user)){
                echo json_encode(["success"=>false,"message"=>"Email Invalid"]);
            }
            elseif(!password_verify($data["password"],$user->password)){
             echo json_encode(["success"=>false,"message"=>"Wrong Password!"]);
             }
             else {
                
                 $_SESSION['email'] = $user->email;         
               echo json_encode(["success"=>true]);   
             }
               
            }

 

    }

?>