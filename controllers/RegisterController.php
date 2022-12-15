<?php
namespace app\controllers;
use app\core\Controller;
use app\core\Request;

    class RegisterController extends Controller{

        //Render Login
        public function register(){       
            return $this->render('register'); 
        }

        public function handleRegister(Request $request){
            $data = $request->getBody();
            $user = $this->userModel->findUserByEmail($data['email']);
    
            if(!$data['email']){
                echo json_encode(["success"=>false,"message"=>"Email is required"]);
            }       
            elseif(!$data['password']){
                echo json_encode(["success"=>false,"message"=>"Password is required"]);
            }
            elseif(!$data['name']){
                echo json_encode(["success"=>false,"message"=>"Name is required"]);
            }
            elseif(!empty($user)){
                echo json_encode(["success"=>false,"message"=>"Email Already Existed"]);
            }
            elseif($data['password'] != $data['passwordconfirm']){
                echo json_encode(["success"=>false,"message"=>"Wrong Repeat Password"]);
            }
            else{
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
                echo json_encode(["success"=>true]);
            }
        } 
            
    
        }



?>