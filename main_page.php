<?php
include_once("tpl/header.php");
include_once("includes/user_data.php");
include_once("includes/category_data.php");
include_once("includes/product_data.php");
include_once("includes/cart_data.php");
if (isset($_POST['cart']) && isset($_POST['product_id']))
{
	if (isset($_SESSION['user_info']))
		create_cart($_SESSION['user_info']['user_id'], $_POST['product_id']);
	else
		add_cart_to_session($_SESSION, $_POST['product_id']);
}
$logout = '<form name="logoutform" action="index.php" method="POST"><input type="submit" name="logout" value="Log out" /></form>';
echo $logout;
$cats = get_cats();
$list = '<div id="list"><ul id="menu-accordeon">';
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
$list .= '</ul></div>';
$uid = $_SESSION['user_info']['user_id'];
$uname = get_users_by_id($uid)[0]['user_name'];
$cartview = '<div id="cart"><p class="head">Panier de '.$uname.' : </p>';
$carts = get_carts_by_user($uid);
$total = 0;
foreach($carts as $cart)
{
	$product_name = get_products_by_id($cart['cart_product'])[0]['product_name'];
	$product_price = get_products_by_id($cart['cart_product'])[0]['product_price'];
	$total += $product_price;
	$cartview .= '<p class="item"><a href="tpl/viewproduct.php?product_id='.$cart['cart_product'].'">'.$product_name.'</a>'
		." Price = ".$product_price.'</p>';
}
$cartview .= '</div>';
echo $list;
echo $cartview;
echo "Total price = $total";

function add_cart_to_session($id)
{
	$exists = 0;
	if (isset($_SESSION['cart']))
	{
		foreach($_SESSION['cart'] as $val)
		{
			if ($val == $id)
				$exists = 1;
		}
	}
	if (!exists)
		$_SESSION['cart'][] = $id;
}
?>
<h1 id="name">Duck Wars</h1>
		<div>
			<img src="img/duck-05.jpg"/>
			<p>All the ducks you've always been dreaming about...</p>
		</div>
