<?php
include_once ("../includes/cart_data.php");
include_once ("../includes/user_data.php");
include_once ("../includes/product_data.php");
$u1 = create_user("abc", "abc", 2);
$u2 = create_user("def", "def", 2);
$p1 = create_product("abc", "abc", 1, 1);
$p2 = create_product("def", "def", 1, 1);
$p3 = create_product("ghi", "ghi", 1, 1);
if (!create_cart(get_users_by_name("abc")[0]['user_id'], get_products_by_name("abc")[0]['product_id']))
	echo "failed creating first cart<br/>";
if (!create_cart(get_users_by_name("def")[0]['user_id'], get_products_by_name("def")[0]['product_id']))
	echo "failed creating second cart<br/>";
$res = get_carts_by_user(get_users_by_name("abc")[0]['user_id']);
$id = $res[0]['cart_id'];
$user = $res[0]['cart_user'];
$product = $res[0]['cart_product'];
if (!update_cart(get_users_by_name("abc")[0]['user_id'], get_users_by_name("def")[0]['user_id'], get_products_by_name("def")[0]['product_id']))
	echo "failed updating cart 1<br/>";
if (get_carts_by_id($id)[0]['cart_id'] != $id)
	echo "Failed retrieving id of first cart</br>";
if (get_carts_by_user(get_users_by_name("abc")[0]['user_id'])[0]['cart_id'] != $id)
	echo "Failed retrieving user of first cart</br>";
if (get_carts_by_product(get_products_by_name("abc")[0]['product_id'])[0]['cart_id'] != $id)
	echo "Failed retrieving cart of first cart</br>";
if (!is_product_in_cart(get_users_by_name("abc")[0]['user_id'], get_products_by_name("abc")[0]['product_id']))
	echo "product abc should be in abc's cart<br/>";
if (!is_product_in_cart(get_users_by_name("def")[0]['user_id'], get_products_by_name("def")[0]['product_id']))
	echo "product def should be in def's cart<br/>";
if (is_product_in_cart(get_users_by_name("abc")[0]['user_id'], get_products_by_name("ghi")[0]['product_id']))
	echo "product ghi should not be in abc's cart<br/>";
if (!delete_cart($id))
	echo "failed deleting first car<br/>";
$res = get_carts_by_user(get_users_by_name("def")[0]['user_id']);
$id = $res[0]['cart_id'];
if (!delete_cart($id))
	echo "failed deleting cart abc<br/>";
delete_user(get_users_by_name("abc")[0]['user_id']);
delete_user(get_users_by_name("def")[0]['user_id']);
delete_product(get_products_by_name("abc")[0]['product_id']);
delete_product(get_products_by_name("def")[0]['product_id']);
delete_product(get_products_by_name("ghi")[0]['product_id']);
echo "Cart tests finished !<br/>";
?>
