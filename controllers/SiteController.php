<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;

class SiteController extends Controller{

    public function homepage(){
        $params = [
            'name' => "Hoang Nguyen"
            
        ];
        return $this->render('home', $params);
    }

    public function  handleContact(Request $request){

        $body = $request->getBody();
        echo "<pre>";
        var_dump($body);
        exit;
    }
    public function contact(){
        return $this->render('contact');
    }
}

?>