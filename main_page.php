<?php
include_once("includes/user_data.php");
include_once("includes/category_data.php");
include_once("includes/product_data.php");
include_once("includes/cart_data.php");
$cats = get_cats();
$list = '<ul id="menu-accordeon">';
foreach($cats as $cat)
{
	foreach($cat as $key=>$val)
		$$key = $val;
	$list .= '<li><a href="tpl/viewcategory.php?cat_id='.$cat_id.'">'.$cat_name.'</a><ul>';
	$products = get_products_by_category($cat_id);
	foreach($products as $product)
	{
		foreach($product as $key=>$val)
			$$key = $val;
		$list .= '<li><a href="tpl/viewproduct.php?product_id='.$product_id.'">'.$product_name.'</a></li>';
	}
	$list .= '</ul></li>';
}
$list .= '</ul>';
echo $list;
?>
