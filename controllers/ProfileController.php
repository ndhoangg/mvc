<?php
namespace app\controllers;
use app\core\Controller;
use app\core\Request;

    class ProfileController extends Controller{

       

        //Render Login
        public function profile(){       
            return $this->render('profile'); 
        }

        public function update(Request $request){
            $data = $request->getBody();
            $data['avatar'] = $_FILES["uploadfile"]["name"];
            $targetFilePath = SITE_ROOT.'/public/uploads/'.$_FILES["uploadfile"]["name"];
            move_uploaded_file($_FILES["uploadfile"]["tmp_name"], $targetFilePath);
            $this->userModel->update($data);
            echo json_encode(["success"=>true]);
        }

        public function updateAvatar(Request $request){
            $data = $request->getBody();
            $data['avatar'] = $_FILES["image"]["name"];
            $targetFilePath = SITE_ROOT.'/public/uploads/'.$_FILES["image"]["name"];
            move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath);
            $this->userModel->uploadImage($data);
            echo json_encode(["success"=>true]);
        }
        
        public function logout(){
            if(isset($_POST['action'])  && $_POST['action'] == "logout" ){
                //$_SESSION = array();
                unset($_SESSION['email']);
            }
        }
    
        }



?>