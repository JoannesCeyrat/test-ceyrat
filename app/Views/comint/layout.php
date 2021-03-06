<!DOCTYPE html>
<html lang="fr">
<head>

	<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<script src="https://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>

	<link media="all" type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

	<base href="http://<?= $_SERVER["HTTP_HOST"].$this->assetUrl(''); ?>" > 

	<?php if (!empty($slider)): ?>
		<link media="all" type="text/css" rel="stylesheet" href="./css/flexslider.css">
		<script src="./scripts/jquery.flexslider-min.js"></script>
	<?php endif ?>

	<link media="all" type="text/css" rel="stylesheet" href="./css/app.css">

	<script src="./scripts/moment-min.js"></script>

	<?php if (!empty($page2)): ?>
		<script src="./scripts/jquery.inview.min.js"></script>
		<script src="./scripts/typehead.0.11.1.min.js"></script>
		<script src="./scripts/bloodhound.0.11.1.min.js"></script>
		<link media="all" type="text/css" rel="stylesheet" href="./css/typehead.css">
	<?php endif ?>



	<script src="./scripts/gestionnaire_articles.js"></script>

	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<title><?= $this->e($title) ?></title>

</head>

	<body>

	<?= $this->section('main_content') ?>
		
</body>
</html>