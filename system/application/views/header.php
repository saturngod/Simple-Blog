<html>
<head>
<title><?= $title ?></title>
<script src="<?= $base ?>/lib/jquery.js"></script>
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?= $base?>/blog.rss" />
<link rel="stylesheet" type="text/css" media="screen" href="<?= $base ?>/css/style.css" />
<script type="text/javascript" src="<?= $base ?>/lib/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="<?= $base ?>/lib/jquery.lavalamp.1.3.2-min.js"></script>


<script>
$(function() {
$('#home_menu').lavaLamp({
	fx: 'easeInOutExpo',
	speed: 800,
	returnDelay:100
});

$("#search").focus(function (){
    if($(this).val()=="Search") $(this).val("");
});
$("#search").keyup(function(event)
{
    
    //alert($(this).val());
    $("#wrapper").html("<img src='<?= $base ?>/img/load.gif'>");
    load_url="<?= $base ?>/index.php/home/search";
    $("#wrapper").load(load_url,{text: $(this).val()} );
});
});
</script>

</head>

<body>
    
<ul id="home_menu" class="lamp">
<li><a href="<?= $base ?>/index.php">Home</a></li>
<li><a href="<?= $base ?>/index.php/admin/new_post">Login</a></li>
</ul>
<input type="text" id="search" size="30" value="Search">
    

