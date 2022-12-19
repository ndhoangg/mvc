<?php
    namespace app\controllers;

    use app\util\AjaxResponse;
    use app\core\Controller;
    use app\core\Request;
    use app\util\Validator;

    class RegisterController extends Controller{

        //Render Login
        public function register(){       
            return $this->render('register'); 
        }

        //Handle Register
        public function handleRegister(Request $request){
            $data = $request->getBody();
            $user = $this->userModel->findUserByEmail($data['email']);
            if(!Validator::validateName($data['name'])){
                $array = ["success"=>false,"message"=>"Invalid Name"];
                AjaxResponse::ajaxResponse($array);
            } elseif (!Validator::validateEmail($data['email'])){
                $array = ["success"=>false,"message"=>"Invalid Email"];
                AjaxResponse::ajaxResponse($array);
            } elseif (!$data['email']){
                $array = ["success"=>false,"message"=>"Email is required"];
                AjaxResponse::ajaxResponse($array);
            } elseif(!$data['password']){
                $array = ["success"=>false,"message"=>"Password is required"];
                AjaxResponse::ajaxResponse($array);
            } elseif(!$data['name']){
                $array = ["success"=>false,"message"=>"Name is required"];
                AjaxResponse::ajaxResponse($array);
            } elseif(!empty($user)){
                $array = ["success"=>false,"message"=>"Email Already Existed"];
                AjaxResponse::ajaxResponse($array);
            } elseif($data['password'] != $data['passwordconfirm']){
                $array = ["success"=>false,"message"=>"Wrong Repeat Password"];
                AjaxResponse::ajaxResponse($array);
            }  else {
                $restname = "";
                $namearr = explode(" ",$data['name']);
                    $firstname = $namearr[count($namearr) - 1];
                    for($i = 0 ; $i < count($namearr)-1; $i++){
                        $newn = " ";
                        $newn.=$namearr[$i];
                        $restname.=$newn;
                    }
                    $lastname = $namearr[0];
                    $username = '@'.strtolower($firstname).strtolower($lastname);
                    $restname = trim($restname);
                    $data['first_name'] = $firstname;
                    $data['last_name'] = $restname;
                    $data['user_name'] = $username;
                    $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);
                $this->userModel->register($data);
                AjaxResponse::ajaxResponseSuccess();
            }
        } 
    }
?>