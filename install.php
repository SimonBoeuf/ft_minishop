<HTML>
<HEAD><meta http-equiv="content-type" content="text/html; charset=utf-8" /></HEAD>
<BODY>

<?php
$mysqli = new mysqli("localhost", "root", "", "mysql");
if ($mysqli->connect_errno) {
    echo "Failed to connect to server : ". $mysqli->connect_errno;
}
else
{
	if (!$mysqli->multi_query(file_get_contents("sql/createdb.sql")))
		echo "Failed creating database : ". $mysqli->error;
	else
		echo "Installed ! Your root access is root/root. You can now remove this file";
}
?>
</BODY>
</HTML>