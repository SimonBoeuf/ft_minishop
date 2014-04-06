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
	$mysqli = new mysqli($_POST['host'], $_POST['username'], $_POST['password'], "mysql");
	if ($mysqli->connect_errno)
	echo "Failed to connect to server : ". mysqli_connect_error();
	else
	{
		$login = $_POST['adminlogin'];
		$password = hash(whirlpool,$_POST['adminpassword']);
		$query = "USE minishop; INSERT INTO users (user_name, user_password, user_type) VALUES('$login','$password', 1);";
		if (!$mysqli->multi_query(file_get_contents("sql/createdb.sql").$query))
			echo "Failed creating database : ". $mysqli->error;
		else
		{
			$s = $_POST['host'].";".$_POST['username'].";".$_POST['password'];
			if (file_put_contents("includes/conf", $s));
			echo "Installed ! Your root access is /root. You can now remove this file";
		}
	}
}
?>
</BODY>
</HTML>
