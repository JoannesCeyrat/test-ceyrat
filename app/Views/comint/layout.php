<!DOCTYPE html>
<html lang="fr">
<head>

	<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<script src="https://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>

	<link media="all" type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

	<?php if ($slider): ?>
		<link media="all" type="text/css" rel="stylesheet" href="http://localhost<?= $this->assetUrl('/css/flexslider.css') ?>">
		<script src="http://localhost<?= $this->assetUrl('/scripts/jquery.flexslider-min.js') ?>"></script>
	<?php endif ?>

	<link media="all" type="text/css" rel="stylesheet" href="http://localhost<?= $this->assetUrl('/css/app.css') ?>">

	<script src="http://localhost<?= $this->assetUrl('/scripts/moment-min.js') ?>"></script>

	<title><?= $this->e($title) ?></title>

</head>

	<body>

	<?= $this->section('main_content') ?>
		
</body>
</html>