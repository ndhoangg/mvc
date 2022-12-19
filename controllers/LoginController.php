<?php

	namespace app\controllers;

	use app\util\AjaxResponse;
	use app\core\Controller;
	use app\core\Request;

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
                $array = ["success"=>false,"message"=>"Email Invalid"];
                AjaxResponse::ajaxResponse($array);
            }
            elseif(!password_verify($data["password"],$user->password)){
                $array = ["success"=>false,"message"=>"Wrong Password!"];
                AjaxResponse::ajaxResponse($array);
            }
             else {      
                $_SESSION['email'] = $user->email;          
               	AjaxResponse::ajaxResponseSuccess();
            }          
        }
	}

?>