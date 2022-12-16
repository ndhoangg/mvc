<?php
namespace app\util;
class AjaxResponse {
    public static function ajaxResponse($array){
        echo json_encode($array);
        exit;
    }

    public static function ajaxResponseSuccess(){
        echo json_encode(["success"=>true]);
        exit;
    }
}





?>
