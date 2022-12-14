<?php

namespace app\core;

class Router{

    public $request;
    public $response;
    protected $routes = [];

    public function __construct($request, $response){
        $this->request = $request;
        $this->response = $response;
    }

    public function get($path, $callback){
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback){
        $this->routes['post'][$path] = $callback;
    }

    public function resolve(){
        $path = $this->request->getPath();
        $method = $this->request->method();
        $callback = $this->routes[$method][$path] ?? false;
        
       
        if ($callback == false){
            $this->response->setStatusCode(404);
            echo "Not Found!";
            exit;
        }
        
        if (is_string($callback)){
            return $this->renderView($callback);
        }
        if (is_array($callback)){
            Application::$app->controller = new $callback[0]();
            $callback[0] = Application::$app->controller;
        }
       
       return call_user_func($callback , $this->request);
       
      
    }
    public function renderView($view ,$params = []){
       
            $layoutContent = $this->layoutContent();
            $viewContent = $this->renderOnlyView($view , $params);
           

            echo str_replace('{{content}}', $viewContent, $layoutContent);

    }

    protected function layoutContent(){
        $layout = Application::$app->controller->layout;
        ob_start();
        include_once Application::$ROOT_DIR."/mvc/views/layouts/$layout.php"; 
        return ob_get_clean();
    }

    protected function renderOnlyView($view, $params){
       
        foreach($params as $key => $value){
           $$key = $value;    
        }     

        ob_start();
        include_once Application::$ROOT_DIR."/mvc/views/$view.php"; 
       
        return ob_get_clean();
    }

    public static function getAsset($dir){
        return "http://".$_SERVER['SERVER_NAME'].'/'.$dir;
    }


}





?>

