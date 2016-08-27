<?php 

?>

<?php use app\session\Session; ?>
<?php $session = Session::getInstance(); ?>
<?php if($session->hasFlash()): ?>
	<div class="row">
	<?php foreach($session->getFlash() as $type => $content): ?>
		<div class="alert alert-<?= $type; ?>"><?= $content; ?></div>
	<?php endforeach; ?>
	</div>
<?php endif; ?>
home page