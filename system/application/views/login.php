</head>
<body>
<?php 
if($err)
{
	echo "<div class='err'>Can't Login</div>";
}
?>
<?= form_open('usr/logincheck') ?>

<table>
	<tr>
		<td>UserName</td>
		<td><?= form_input('username') ?></td>
	</tr>
	<tr>
		<td>Password</td>
		<td><?= form_password('pwd') ?></td>
	</tr>
</table>
<?= form_submit('','Login') ?> &nbsp;
<?= form_reset('','Clear') ?>
</form>
</body>