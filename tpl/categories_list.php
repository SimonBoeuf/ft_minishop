<?php
	include_once("./includes/category_data.php");
	$users = get_cats();
	$table = '<table border="1"><th name="id">ID</th><th name="name">Name</th><th name="description">Description</th><th name="update"></th><th name="delete"></th>';
	foreach($users as $row)
	{
		foreach($row as $key=>$val)
			$$key = $val;
		$table .= '<tr name="'.$cat_id.'"><td>'.$cat_id.'</td><td>'.$cat_name.'</td><td>'.$cat_description.'</td>';
	}
	$table .= '</table>';
	echo $table;
	$form = '<form action="#" method="POST"><input type="submit" value="Admin home" /></form>';
	echo $form;
?>