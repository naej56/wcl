<?php 
namespace app\session;

class Session{
	static $instance;

	static function getInstance(){
		if(!self::$instance){
			self::$instance = new Session();
		}
		return self::$instance;
	}

	public function __construct(){
		session_start();
	}

	public function write($key, $value){
		$_SESSION[$key] = $value;
	}

	public function read($key){
		return $_SESSION[$key];
	}

	public function delete($key){
		unset($_SESSION[$key]);
	}

	public function setFlash($type, $content){
		$_SESSION['flash'][$type] = $content;
	}

	public function getFlash(){
		$flash = $_SESSION['flash'];
		$this->delete('flash');
		return $flash;
	}

	public function hasFlash(){
		if(isset($_SESSION['flash'])){
			return true;
		} else {
			return false;
		}
	}

}
