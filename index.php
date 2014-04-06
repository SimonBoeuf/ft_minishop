<?php
session_start();
if (isset($_POST['logout']))
{
	session_destroy();
	unset($_SESSION);
}
include_once ("includes/user_data.php");
$error = (isset($_POST['username']) && isset($_POST['password']) && !check_params($_POST['username'], $_POST['password'])) ? "Invalid connection details" : "";
include("tpl/header.php");
$username = "";
if (isset($_SESSION['username']))
{
	$_SESSION['user_info'] = get_user_info($_SESSION['username']);
	if ($_SESSION['user_info']['user_type'] == 2)
		include ("main_page.php");
	elseif ($_SESSION['user_info']['user_type'] == 1)
		include ("admin_page.php");
}
elseif (isset($_POST['login']) && isset($_POST['username']) && isset($_POST['password']))
{
	if (check_params($_POST['username'], $_POST['password']) == 1)
	{
		$_SESSION['username'] = $_POST['username'];
		$_SESSION['user_info'] = get_user_info($_SESSION['username']);
		if ($_SESSION['user_info']['user_type'] == 2)
			include ("main_page.php");
		elseif ($_SESSION['user_info']['user_type'] == 1)
			include ("admin_page.php");
	}
	else
		$username = $_POST['username'];
}
include("tpl/footer.html");
?>
<div>
	<h2>Des produits uniques...</h2>
	<div><img src ="" /></div>
</div>
