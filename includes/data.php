<?php
function connect_db()
{
	$mysqli = new mysqli("localhost", "root", "", "minishop");
	return ($mysqli);
}
?>