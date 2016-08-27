<?php 

?>
<div class="row row-first">
<?php use app\session\Session; ?>
<?php $session = Session::getInstance(); ?>
<?php if($session->hasFlash()): ?>
	<div class="col-xs-12 col-sm-4 col-md-3 text-center-xs">
	<?php foreach($session->getFlash() as $type => $content): ?>
		<div class="alert alert-<?= $type; ?>"><?= $content; ?></div>
	<?php endforeach; ?>
	</div>
<?php endif; ?>
<div class="col-xs-12 col-sm-8 col-md-9">
	home page
</div>
</div>