<?php
function connect_db()
{
	$mysqli = new mysqli("localhost", "root", "", "minishop");
	if ($mysqli->connect_errno)
		echo "Database connection failed : ". mysqli_connect_error();
	return ($mysqli);
}
?>