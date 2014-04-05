<?php
include("data.php");

function get_user_info($username)
{
	if ($mysqli = connect_db())
	{
		$res = $mysqli->query("SELECT user_id, user_name, user_type FROM users where user_name ='$username'");
		$row = $res->fetch_assoc();
		return $row;
	}
}

function check_params($username, $password)
{
	if ($mysqli = connect_db())
	{
		if (!$res = $mysqli->query("SELECT count(*) as numrows FROM users WHERE user_name ='$username' AND user_password = '$password';"))
			echo "Request failed : ".$mysqli->error;
		else
		{
			$row = $res->fetch_assoc();
			return ($row['numrows'] == 1);
		}
	}
}
?>