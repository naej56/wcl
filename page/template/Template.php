<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="../../favicon.ico">

		<title>Web Command Line</title>

		<!-- Bootstrap core CSS -->
		<link href="/cdn/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">
		<!-- WCL CSS -->
		<link href="css/bootstarp-black-and-green.min.css" rel="stylesheet">
		<link href="css/wcl.css" rel="stylesheet">


	</head>

	<body>
		<div class="container-fluid">
			<!-- Affichage des messages flash -->
			<?php use app\session\Session; ?>
			<?php $session = Session::getInstance(); ?>
			<?php if($session->hasFlash()): ?>
				<?php var_dump($session->getFlash()); ?>
				<div class="row">
				<?php foreach($session->getFlash() as $type => $content): ?>
					<div class="alert alert-<?= $type; ?>"><?= $content; ?></div>
				<?php endforeach; ?>
				</div>
			<?php endif; ?>
			<?= $content; ?>
		</div>


		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
		<script src="/cdn/bootstrap-3.3.7/js/bootstrap.min.js"></script>
	</body>
</html>