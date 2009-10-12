<html>
<head>
<title><?= $title ?></title>
<script src="<?= $base ?>/lib/jquery.js"></script>
<script src="<?= $base ?>/editor/jquery.wysiwyg.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="<?= $base ?>/editor/jquery.wysiwyg.css">
<link rel="stylesheet" type="text/css" media="screen" href="<?= $base ?>/css/adminstyle.css" />

<script type="text/javascript" src="<?= $base ?>/lib/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="<?= $base ?>/lib/jquery.lavalamp.1.3.2-min.js"></script>

<script>
$(function() {
$('#admin_menu').lavaLamp({
	fx: 'easeInOutExpo',
	speed: 800,
	returnDelay:100
});
});
</script>
</head>
<body>
<ul id="admin_menu" class="lamp">
<li><a href="<?= $base ?>/index.php/admin/">Home</a></li>
<li><a href="<?= $base ?>/index.php/admin/new_post">Add New</a></li>
<li><a href="<?= $base ?>/index.php/usr/logout">Logout</a></li>
</ul>