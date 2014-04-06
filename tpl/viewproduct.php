<?php
include_once("../includes/user_data.php");
include_once("../includes/product_data.php");
include_once("../includes/category_data.php");
include_once("../includes/cart_data.php");
include("header.html");
session_start();
if (!isset($_GET['product_id']) || ($product = get_products_by_id($_GET['product_id'])) == FALSE)
	echo "Please select a valid product";
else
{
	$product = $product[0];
	foreach($product as $key=>$val)
		$$key = $val;
	$view = '<div id ="product">';
	$view = '<p class="title">Product : '.$product_name.'</p>';
	$view .='<p class="description">Description : '.$product_description.'</p>';
	$view .='<p class="price">Price : '.$product_price.' &#8364;</p>';
	$view .='<p class="category">Category : '.get_cats_by_id($product_category)[0]['cat_name'].'</p>';
	$view .='</div>';
	echo $view;
}
$user = $_SESSION['user_info']['user_id'];
if (isset($_SESSION['user_info']) && $res = is_product_in_cart($user, $product_id))
	echo '<form action="../index.php" method="POST" name="cartform"><input type="hidden" name="product_id" value="'.$product_id.'"><input type="submit" disabled="disabled" name="cart" value="Already in cart !" /></form>';
else
{
	echo '<form action="../index.php" method="POST" name="cartform"><input type="hidden" name="product_id" value="'.$product_id.'"><input type="submit" name="cart" value="Add to cart" /></form>';
}
echo '<form action="../index.php"><input type="submit" value="Home" /></form>';
include("footer.html");
?>
