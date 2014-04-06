<?php
	$logout = '<form name="logoutform" action="index.php" method="POST"><input type="submit" name="logout" value="Log out" /></form>';
	echo $logout;
	if (isset($_POST['users']))
		include ("tpl/users_list.php");
	elseif (isset($_POST['categories']))
		include ("tpl/categories_list.php");
	elseif (isset($_POST['products']))
		include ("tpl/products_list.php");
	else
	{
		$page = '<form name="usersform" method="POST" action="#"><input type="submit" name="users" value="User management" /></form>';
		$page .= '<form name="categoriesform" method="POST" action="#"><input type="submit" name="categories" value="Categories management" /></form>';
		$page .= '<form name="productsform" method="POST" action="#"><input type="submit" name="products" value="Products management" /></form>';
		echo $page;
	}
?>