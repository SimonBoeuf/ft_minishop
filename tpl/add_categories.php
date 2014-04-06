<?php

session_start();
include ("./header.html");
include ("../includes/category_data.php");

if ($_SESSION['user_info']['user_type'] != 1)
	echo "Please login as root to see this page.";
else
{
	if (isset($_POST['addcat']))
	{
		foreach($_POST as $key=>$val)
			$$key = $val;
			if (create_cat($cat_name, $cat_description))
				echo "User successfully created !";
			else
				echo "Sorry, something went wrong... Try again later ?";
		echo '<a href="../index.php">Go back to admin home</a>';
	}
	else
	{
		if (isset($_GET['action']) && $_GET['action'] == 3)
		{
				if (delete_cat($_GET['cat_id']))
					echo "Category deleted !";
				else
					echo "Oops, could not delete !";
				echo '<a href="../index.php">Go back to admin home</a>';
		}
		else
		{
			if (isset($_POST['addcat']))
				echo "You must have been wrong somewhere...";
			$action = 1;
			if (isset($_GET['cat_id']))
			{
				$action = 2;
				$user = get_cats_by_id($_GET['cat_id'])[0];
				foreach($user as $key=>$val)
					$$key = $val;
			}
		}
	}
}

include ("./footer.html");

?>

<form action="#" method="POST" name="addcatform">
	<input type="hidden" name="cat_id" value=$cat_id />
		Category name : <input type="text" name="cat_name" /><br />
		Category description : <input type="text" name="cat_description" />
	<input type="submit" name="addcat" value="Ok !"/>
</form>
<form action="../index.php" method="POST"><input type="submit" value="Cancel"/></form>