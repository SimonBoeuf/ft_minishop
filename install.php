<HTML>
<HEAD><meta http-equiv="content-type" content="text/html; charset=utf-8" /></HEAD>
<BODY>
<?php
if (!isset($_POST['params']))
{
	$form = '<form action="#" method="POST">Please enter server\'s details :';
	$form .= 'Host : <input type="text" name="host" />';
	$form .= 'Username : <input type="text" name="username" />';
	$form .= 'Password : <input type="password" name="password" />';
	$form .= 'Shop admin login : <input type="text" name="adminlogin" />';
	$form .= 'Password : <input type="text" name="adminpassword" />';
	$form .= '<input type="submit" value="Install !" name="params" />';
	$form .= '</form>';
	echo $form;
}
else
{
	$mysqli = mysqli_connect($_POST['host'], $_POST['username'], $_POST['password'], "mysql");
	if (!$mysqli)
	echo "Failed to connect to server : ". mysqli_connect_error();
	else
	{
		$login = $_POST['adminlogin'];
		$password = hash(whirlpool,trim($_POST['adminpassword']));
		if (strlen($login) < 1 || strlen($login) > 255 || strlen(trim($_POST['adminpassword'])) < 1 || strlen(trim($_POST['adminpassword'])) > 255)
			echo "Bad admin credentials";
		else
		{
			$query = "USE minishop; INSERT INTO users (user_name, user_password, user_type) VALUES('$login','$password', 1);";
			if (!mysqli_multi_query($mysqli, file_get_contents("sql/createdb.sql").$query))
				echo "Failed creating database : ". mysqli_error($mysqli);
			else
			{
				$s = $_POST['host'].";".$_POST['username'].";".$_POST['password'];
				if (file_put_contents("includes/conf", $s));
				echo "Installed ! Your root access is /root. You can now remove this file";
			}
		}
	}
}
?>
</BODY>
</HTML>
