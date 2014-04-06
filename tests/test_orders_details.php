<?php
include_once ("../includes/order_data.php");
include_once ("../includes/order_detail_data.php");
include_once ("../includes/category_data.php");
include_once ("../includes/product_data.php");
include_once ("../includes/user_data.php");
create_cat("testcat", "");
$cat = get_cats_by_name("testcat")[0]['cat_id'];
create_product("testproduct", "", 2, $cat);
$prod = get_products_by_name("testproduct")[0]['product_id'];
create_user("testuser", "testuser", 2);
$user = get_users_by_name("testuser")[0]['user_id'];
create_order($user);
$order = get_orders_by_user($user)[0]['order_id'];
if (!create_order_detail($order, $prod))
	echo "failed creating first order detail<br/>";
if (create_order_detail($order, $prod))
	echo "couple should be unique<br/>";
$res = get_orders_details_by_product($prod);
$res2 = get_orders_details_by_order($order);
$obypid = $res[0]['order_details_id'];
$obyoid = $res2[0]['order_details_id'];
if ($obypid != $obyoid)
	echo "Failed either one or the other search method<br/>";
if (!delete_order_detail($obypid))
	echo "failed deleting order abc<br/>";
delete_order($order);
delete_user($user);
delete_product($prod);
delete_cat($cat);
echo "Order details tests finished !<br/>";
?>
