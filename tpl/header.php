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
	$connected = '<p>Deconnection</p><form name="logoutform" action="index.php" method="POST"><input type="submit" name="logout" value="Log out" /></form>';
	$disconnected = '<p>Connection</p><form name="loginform" action="#" method="POST">
	Login : <input type="text" name="username" value="" /><br />
	Password : <input type="password" name="password" />
	<input id="submit" type="submit" name="sm" value="Connect" name="login" /></form>';
if (isset($_SESSION['username']))
{
		echo $connected;
$_SESSION['user_info'] = get_user_info($_SESSION['username']);

}
elseif (isset($_POST['username']) && isset($_POST['password']))
{
	if (check_params($_POST['username'], $_POST['password']))
	{
		$_SESSION['username'] = $_POST['username'];
		$_SESSION['user_info'] = get_user_info($_SESSION['username']);
		echo $connected;
	}
	else
	{
		$username = $_POST['username'];
		$error = "Invalid connectoin details";
		echo $disconnected;
	}
}
else
{
	echo $disconnected;
}
?></li>
	</ul>
</header><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
</html>
