<?php 
use app\session\Auth;
use app\session\Session;

$session = Session::getInstance();
$auth = App::getAuth();
$login = '';

if(isset($_POST['action'])){
	if($_POST['action'] === 'login'){
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
				App::redirect('home');
			} /*else {
				App::redirect('login');
			}*/
		}
	}
}

?>

<?php if($session->hasFlash()): ?>
	<div class="row">
	<?php foreach($session->getFlash() as $type => $content): ?>
		<div class="alert alert-<?= $type; ?>"><?= $content; ?></div>
	<?php endforeach; ?>
	</div>
<?php endif; ?>

 <div class="row login-layout">
 	<div class="col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-4 col-md-2 col-md-offset-5 vertical-center">
 		<form action="index.php" method="POST" class="form-signin">
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
			<input type="hidden" name="action" value="login">
			<input type="hidden" name="pwd" value="login">
 		</form>
 	</div>
 </div>