<?php
    namespace app\controllers;

    use app\util\AjaxResponse;
    use app\core\Controller;
    use app\core\Request;
    use app\util\Validator;

    class ProfileController extends Controller{

        //Render Profile UI
        public function profile(){       
            return $this->render('profile'); 
        }

        //Update Data
        public function update(Request $request){
            $data = $request->getBody();
            $data['avatar'] = $_FILES["uploadfile"]["name"];
            $validate = Validator::validateImage($_FILES["uploadfile"]["name"],$_FILES["uploadfile"]["tmp_name"],$_FILES["uploadfile"]["size"]);

            if($validate['success'] == true){
                $this->userModel->update($data);
                AjaxResponse::ajaxResponseSuccess();
            }
            else{
                AjaxResponse::ajaxResponse($validate);
            }
        }

        //Update Avatar
        public function updateAvatar(Request $request){
            $data = $request->getBody();
            $data['avatar'] = $_FILES["image"]["name"];
            $validate = Validator::validateImage($_FILES["image"]["name"],$_FILES["image"]["tmp_name"],$_FILES["image"]["size"]);
        
            if($validate['success'] == true){
                $this->userModel->uploadImage($data);
                AjaxResponse::ajaxResponseSuccess();
            }
            else{
                AjaxResponse::ajaxResponse($validate);
            }
        }
        
        //Log Out
        public function logout(){
            if(isset($_POST['action'])  && $_POST['action'] == "logout" ){
                //$_SESSION = array();
                unset($_SESSION['email']);
            }
        }
    }



?>