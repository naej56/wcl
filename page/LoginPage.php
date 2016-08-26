<?php 
use app\session\Auth;
use app\session\Session;

$session = Session::getInstance();
$auth = App::getAuth();
$login = '';

if(isset($_GET['action'])){
	if($_GET['action'] === 'login'){
		if(isset($_POST['login']) && isset($_POST['password'])){
			$login = $_POST['login'];
			$password = $_POST['password'];
			if($auth->login($login, $password)){
				$session->setFlash('success', 'Bienvenu !');
				$isLog = true;
			} else {
				$session->setFlash('danger', 'Erreur d\'identification');
				$isLog = false;
			}
			if($isLog){
				App::redirect('index.php?pwd=home');
			} else {
				App::redirect('index.php?pwd=login');
			}
		}
	}
}

?>

 <div class="row login-layout">
 	<div class="col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-4 col-md-2 col-md-offset-5 vertical-center">
 		<form action="index.php?pwd=login&action=login" method="POST" class="form-signin">
 			<div class="form-group">
 				<div class="text-center-xs"><label>Login</label></div>
 				<input type="text" name="login" class="form-control" value="<?= $login; ?>" required autofocus>
 			</div>
 			<div class="form-group">
 				<div class="text-center-xs"><label>Password</label></div>
 				<input type="password" name="password" class="form-control" required>
 			</div>
 			<label>  </label>
 			<button type="sublit" class="btn btn-block btn-success">Login</button>
 		</form>
 	</div>
 </div>