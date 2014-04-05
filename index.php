<?php
include_once ("includes/user_data.php");
session_start();
if (isset($_POST['logout']))
	unset($_SESSION);
unset($_SESSION);
$error = 0;
$username = "";
if (isset($_SESSION['username']))
{
	$_SESSION['user_info'] = get_user_info($_SESSION['username']);
	include ("main_page.php");
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
	$form = '<form name="loginform" action="#" method="POST">';
	$form .= 'Login : <input type="text" name="username" value="'.$username.'" />';
	$form .= 'Password : <input type="password" name="password" />';
	$form .= '<input type="submit" value="Connect" name="login" />';
	$form .= '<form name="guestform"><input type="submit" name="guest" value="Continue as guest" /></form>';
	echo $form;
	echo $error != 1 ? $error : "";
}
?>