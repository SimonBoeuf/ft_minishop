<?php
	include_once("./includes/user_data.php");
	$users = get_users();
	$add = '<form action="./tpl/add_user.php"><input type="submit" value="Add" /></form>';
	$table = '<table border="1"><th name="id">ID</th><th name="name">Name</th><th name="password">Password</th><th name="type">Type</th><th name="cart"></th><th name="update"></th><th name="delete"></th>';
	foreach($users as $row)
	{
		foreach($row as $key=>$val)
			$$key = $val;
		$type = $user_type == 1 ? 'root' : 'user';
		$table .= '<tr name="'.$user_id.'"><td>'.$user_id.'</td><td>'.$user_name.'</td><td>'.$user_password.'</td><td>'.$type.'</td><td></td><td><a href="tpl/add_user.php?user_id='.$user_id.'">Update</a></td><td><a href="tpl/add_user.php?user_id='.$user_id.'&action=3">Delete</a></td>';
	}
	$table .= '</table>';
	echo $add;
	echo $table;
	$form = '<form action="#" method="POST"><input type="submit" value="Admin home" /></form>';
	echo $form;
?>
