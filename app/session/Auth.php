<?php 
namespace app\session;
use app\session\UserList;

class Auth{
	private $session;
	

	public function __construct($session){
		$this->session = $session;
	}

	public function login($login, $password){
		$users = new UserList();
		$user = (object) $users->getUser();
		if($login === $user->user && $password === $user->password){
			$this->session->write('auth', $user);
			return true;
		}
		return false;
	}

	static function isAuth(){
		if(isset($_SESSION['auth'])){
			return true;
		} else {
			return false;
		}
	}
}

