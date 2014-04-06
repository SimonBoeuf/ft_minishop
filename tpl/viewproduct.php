<?php
include_once("../includes/user_data.php");
include_once("../includes/product_data.php");
include_once("../includes/category_data.php");
include("header.html");
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
include("footer.html");
?>
