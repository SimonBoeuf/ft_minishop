<?php
	echo "admin page";
	if ($rows = get_users_by_type(1))
		var_dump($rows);
	else
		echo "Failed trying to create user :(";
	$logout = '<form name="logoutform" action="index.php" method="POST"><input type="submit" name="logout" value="Log out" /></form>';
	echo $logout;
?>