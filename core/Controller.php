<?php
	namespace app\core;

	session_start();

	use app\core\Application;
	use app\models\User;
	
	class Controller{
		public $layout = 'main';
		public $userModel;
		public function __construct(){
			$this->userModel = new User;
		}
		public function setLayout($layout){
			$this->layout = $layout;
		}
		public function render($view, $params = []){
			return Application::$app->router->renderView($view,$params);
		}
	}

?>