<?php
include("tpl/header.html");
include_once ("includes/user_data.php");
session_start();
if (isset($_POST['logout']))
{
	session_destroy();
	unset($_SESSION);
}
$error = 0;
$username = "";
if (isset($_SESSION['username']))
{
	$_SESSION['user_info'] = get_user_info($_SESSION['username']);
	if ($_SESSION['user_info']['user_type'] == 2)
		include ("main_page.php");
	elseif ($_SESSION['user_info']['user_type'] == 1)
		include ("admin_page.php");
}
elseif (isset($_POST['guest']))
{
	$_SESSION['guest'] = 1;
	include ("main_page.php");
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
	{
		$username = $_POST['username'];
		$error = "Invalid connectoin details";
	}
}
else
	$error = 1;
if ($error)
{
	include("tpl/form.html");
	echo $error != 1 ? $error : "";
}
include("tpl/footer.html");
?>
