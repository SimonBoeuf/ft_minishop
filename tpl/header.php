<!DOCTYPE html>
<html>
<head>
	<link href="css/visual.css" type="text/css" rel="stylesheet"/>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>E-Commerce</title>
</head>
<header class="entry">
	<ul>
		<li><a href="main_page.php"><p>Accueil</p></a></li>
		<li><a href=""><p>Boutique</p></a></li>
		<li><a href=""><p>Panier</p></a></li>
		<li><a href=""><p>Inscription</p></a></li>
		<li><?php

if ($_POST['sm'] !== "Connect" && isset($_POST['users']) === false)
{ ?><p>Connection</p>
<form name="loginform" action="#" method="POST">
	Login : <input type="text" name="username" value="" /><br />
	Password : <input type="password" name="password" />
	<input id="submit" type="submit" name="sm" value="Connect" name="login" />
</form>
<form name="guestform">
	<input type="submit" name="guest" value="Continue as guest" />
</form>
<?php
$logged = 1;
}
else
{ ?>
<p>Deconnection</p>
	<form name="logoutform" action="index.php" method="POST"><input type="submit" name="logout" value="Log out" /></form>
<?php }

?></li>
	</ul>
</header><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
</html>