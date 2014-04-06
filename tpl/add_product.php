<?php
session_start();
include ("./header.html");
include ("../check_fields.php");
include ("../includes/product_data.php");
include ("../includes/category_data.php");
if ($_SESSION['user_info']['user_type'] != 1)
	echo "Please login as root to see this page.";
else
{
	if (isset($_POST['addproduct']) && check_product_fields($_POST))
	{
		foreach($_POST as $key=>$val)
			$$key = $val;
		if ($action == 1)
		{
			if (create_product($product_name, $product_description, $product_price, $product_category))
				echo "Product successfully created !";
			else
				echo "Sorry, something went wrong... Try again later ?";
		}
		elseif ($action == 2)
		{
			if (update_product($product_id, $product_name, $product_description, $product_price, $product_category))
				echo "Product successfully updated !";
			else
				echo "Sorry, something went wrong... Try again later ?";
		}
		echo '<a href="../index.php">Go back to admin home</a>';
	}
	else
	{
		if (isset($_GET['action']) && $_GET['action'] == 3)
		{
			if (delete_product($_GET['product_id']))
				echo "Product deleted !";
			else
				echo "Oops, could not delete !";
			echo '<a href="../index.php">Go back to admin home</a>';
		}
		else
		{
			if (isset($_POST['addproduct']))
				echo "You must have been wrong somewhere...";
			$action = 1;
			$product_id = 0;
			$product_name = "";
			$product_description = "";
			$product_price = 0;
			$product_category = -1;
			if (isset($_GET['product_id']))
			{
				$action = 2;
				$product = get_products_by_id($_GET['product_id'])[0];
				foreach($product as $key=>$val)
					$$key = $val;
			}
			$form = '<form action="#" method="POST" name="addproductform">';
			$form .='<input type="hidden" name="product_id" value="'.$product_id.'" />';
			$form .= 'Name : <input type="text" name="product_name" value ="'.$product_name.'" />';
			$form .= 'Description : <input type="text" name="product_description" value ="'.$product_description.'" />';
			$form .= 'Price : <input type="text" name="product_price" value ="'.$product_price.'" />';
			$form .= 'Category : '. get_select_cat($product_category);
			$form .='<input type="hidden" name="action" value="'.$action.'" />';
			$form .= '<input type="submit" name="addproduct" value="Ok !"/>';
			$form .= '</form>';
			$form .= '<form action="../index.php" method="POST"><input type="submit" value="Cancel"/></form>';
			echo $form;
		}
	}
}
include ("./footer.html");

function get_select_cat($id)
{
	$cats = get_cats();
	$select = '<select name="product_category">';
	foreach ($cats as $cat)
	{
		foreach($cat as $key=>$val)
			$$key = $val;
		$select .= '<option value="'.$cat_id.'" ';
		if ($cat_id == $id)
			$select .= 'selected="selected" ';
		$select .= '>'.$cat_name.'</option>';
	}
	$select .= '</select>';
	return ($select);
}

?>
