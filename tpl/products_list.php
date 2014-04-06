<?php
	include_once("./includes/product_data.php");
	include_once("./includes/category_data.php");
	$users = get_products();
	$table = '<table border="1"><th name="id">ID</th><th name="name">Name</th><th name="description">Description</th><th name="price">Price</th><th name="Category">Category</th><th name="update"></th><th name="delete"></th>';
	foreach($users as $row)
	{
		foreach($row as $key=>$val)
			$$key = $val;
		$cat_name = get_cats_by_id($product_category)[0]['cat_name'];
		$table .= '<tr name="'.$product_id.'"><td>'.$product_id.'</td><td>'.$product_name.'</td><td>'.$product_description.'</td><td>'.$product_price.'</td><td>'.$cat_name.'</td>';
	}
	$table .= '</table>';
	echo $table;
	$form = '<form action="#" method="POST"><input type="submit" value="Admin home" /></form>';
	echo $form;
?>