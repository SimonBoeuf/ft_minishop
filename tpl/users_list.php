<?php
	include_once("./includes/user_data.php");
	$users = get_users();
	create_user("user1", "user1", 2);
	$table = '<table border="1"><th name="id">ID</th><th name="name">Name</th><th name="password">Password</th><th name="type">Type</th><th name="cart"></th><th name="update"></th><th name="delete"></th>';
	foreach($users as $row)
	{
		foreach($row as $key=>$val)
			$$key = $val;
		$table .= '<tr name="'.$user_id.'"><td>'.$user_id.'</td><td>'.$user_name.'</td><td>'.$user_password.'</td><td>'.$user_type.'</td><td></td><td><a href="tpl/add_user.php?user_id='.$user_id.'">Update</a></td><td><a href="tpl/add_user.php?user_id='.$user_id.'&action=3">Delete</a></td>';
	}
	$table .= '</table>';
	echo $table;
	$form = '<form action="#" method="POST"><input type="submit" value="Admin home" /></form>';
	echo $form;
?>