<?php 
use app\session\Session;
use app\session\Auth;
define('ROOT', dirname(__DIR__));
require ROOT . '/app/App.php';
App::load();

Session::getInstance();

if(isset($_GET['pwd'])){
	$pwd = $_GET['pwd'];
} else {
	$pwd = 'home';
}

if(!Auth::isAuth()){
	$pwd = 'login';
}

ob_start();
if($pwd === 'login'){
	require ROOT . '/page/LoginPage.php';
} elseif($pwd === 'home'){
	require ROOT . '/page/HomePage.php';
}

$content = ob_get_clean();
require ROOT. '/page/template/Template.php';