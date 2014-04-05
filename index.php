<?php
include ("includes/user_data.php");
session_start();
$username = "";
if (isset($_SESSION['username']))
{
	$_SESSION['user_info'] = get_user_info($_SESSION['username']);
	include ("main_page.php");
}
elseif (isset($_POST['login']) && isset($_POST['username']) && isset($_POST['password']))
{
	if (check_params($_POST['username'], $_POST['password']))
	{
		$_SESSION['username'] = $_POST['username'];
		$_SESSION['user_info'] = get_user_info($_SESSION['username']);
		include ("main_page.php");
	}
	else
	{
		$username = $_POST['username'];
		$error = "Invalid connectoin details";
	}
}
else
{
	$form = '<form name="loginform" action="#" method="POST">';
	$form .= 'Login : <input type="text" name="username" value="'.$username.'" />';
	$form .= 'Password : <input type="password" name="password" />';
	$form .= '<input type="submit" value="Connect" name="login" />';
	echo $form;
}
?>