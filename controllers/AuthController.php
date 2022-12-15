<?php

namespace app\controllers;
session_start();
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
            $_SESSION['email'] = $user->email;
          echo json_encode(["success"=>true]);
         
        }
          
       }
    

    public function logout(){

     
    
        if(isset($_POST['action'])  && $_POST['action'] == "logout" ){
            
            //$_SESSION = array();
            unset($_SESSION['email']);
        }
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
            $this->userModel->register($data);
            echo json_encode(["success"=>true]);
        }
    }

    public function update(){
        
    }
}

?>