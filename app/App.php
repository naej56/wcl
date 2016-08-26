<?php 
use app\session\Auth;
use app\session\Session;

class App{
	private static $_instance;

	public static function load(){
		require ROOT . '/app/Autoloader.php';
		app\Autoloader::register();
	}

	public static function getInstance(){
		if(is_null(self::$_instance)){
			self::$_instance = new App();
		}
		return self::$_instance;
	}

	static function getAuth(){
		return new Auth(Session::getInstance());
	}

	static function redirect($page){
		header("Location: $page");
	}

}

