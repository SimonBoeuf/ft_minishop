<?php
function connect_db()
{
	$mysqli = new mysqli("localhost", "root", "", "mysql");
	return ($mysqli);
}
?>