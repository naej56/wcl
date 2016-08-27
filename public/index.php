<?php 
use app\session\Session;
use app\session\Auth;
define('ROOT', dirname(__DIR__));
require ROOT . '/app/App.php';
App::load();

Session::getInstance();

if(isset($_SESSION['pwd'])){
	$pwd = $_SESSION['pwd'];
} else {
	$pwd = '404';
}

if(!Auth::isAuth()){
	$pwd = 'login';
}

ob_start();
if($pwd === 'login'){
	require ROOT . '/page/LoginPage.php';
} elseif($pwd === 'home'){
	require ROOT . '/page/HomePage.php';
} elseif($pwd === '404'){
	require ROOT . '/page/404.php';
}

$content = ob_get_clean();
require ROOT. '/page/template/Template.php';