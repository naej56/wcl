<?php 
use app\session\Auth;
use app\session\Session;

$session = Session::getInstance();
$auth = App::getAuth();
$login = '';
$tryConnect = false;

if(isset($_POST['action'])){
	if($_POST['action'] === 'login'){
		if(isset($_POST['login']) && isset($_POST['password'])){
			$login = $_POST['login'];
			$password = $_POST['password'];
			if($auth->login($login, $password)){
				$session->setFlash('success', 'Bienvenue');
				App::redirect('home');
				debug($fichier, $_SESSION['flash']['success']);
				exit();
			} else {
				$session->setFlash('danger', 'Erreur d\'identification');
				$tryConnect = true;
			}
		}
	} elseif ($_POST['action'] === 'logout'){
		$session->delete('auth');
		session_destroy();
		$session->setFlash('success', 'Déconnection !');
		App::redirect('login');
		exit();
	}
} 
?>



 <div class="row row-first">
 	<div class="col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-4 col-md-2 col-md-offset-5 text-center-xs">
 		<?php if($session->hasFlash()): ?>
			<div class="">
			<?php foreach($session->getFlash() as $type => $content): ?>
				<div class="alert alert-<?= $type; ?>"><?= $content; ?></div>
			<?php endforeach; ?>
			</div>
		<?php endif; ?>
 		<form action="index.php" method="POST" class="form-signin">
 			<div class="form-group">
 				<label for="login">Login</label>
 				<input type="text" name="login" class="form-control" value="<?= $login; ?>" required <?php if(!$tryConnect): ?> autofocus<?php endif; ?>/>
 			</div>
 			<div class="form-group">
 				<label for="password">Password</label>
 				<input type="password" name="password" class="form-control" required <?php if($tryConnect): ?> autofocus<?php endif; ?>
 				/>
 			</div>
 			<label>  </label>
 			<button type="submit" class="btn btn-block btn-success">Login</button>
			<input type="hidden" name="action" value="login">
			<input type="hidden" name="pwd" value="login">
 		</form>
 	</div>
 </div>