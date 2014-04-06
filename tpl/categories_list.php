<form action="./tpl/add_categories.php"><input type="submit" value="Add" /></form>
<?php
	include_once("./includes/category_data.php");
	$users = get_cats(); ?>
<table border="1"><th name="id">ID</th><th name="name">Name</th><th name="description">Description</th><th name="update">Update</th><th name="delete">Delete</th>
<?php
	foreach($users as $row)
	{
		foreach($row as $key=>$val)
			$$key = $val;
		echo "<tr name=$cat_id><td>$cat_id</td><td>$cat_name</td><td>$cat_description</td><td><a href=\"tpl/add_categories.php?cat_id=$cat_id\">Update</td><td><a href=\"tpl/add_categories.php?cat_id=$cat_id&action=3\">Delete</a></td>";
	}
?>
</table>
<form action="#" method="POST"><input type="submit" value="Admin home" /></form>
