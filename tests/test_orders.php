<?php
include_once ("../includes/order_data.php");
include_once ("../includes/user_data.php");
$u1 = create_user("abc", "abc", 2);
$u2 = create_user("def", "def", 2);
if (!create_order(get_users_by_name("abc")[0]['user_id']))
	echo "failed creating first order<br/>";
if (!create_order(get_users_by_name("def")[0]['user_id']))
	echo "failed creating second order<br/>";
$uid = get_users_by_name("abc")[0]['user_id'];
$uid2 = get_users_by_name("def")[0]['user_id'];
$res = get_orders_by_user($uid);
$id = $res[0]['order_id'];
$user = $res[0]['order_user'];
if (!update_order($id, $uid2))
	echo "failed updating order 1<br/>";
if (get_orders_by_id($id)[0]['order_id'] != $id)
	echo "Failed retrieving id of first order</br>";
$oid = get_orders_by_user($uid2)[0]['order_id']; 
if ($oid != $id)
	echo "Failed retrieving user of second order</br>";
if (!delete_order($id))
	echo "failed deleting first order<br/>";
$res = get_orders_by_user(get_users_by_name("def")[0]['user_id']);
$id = $res[0]['order_id'];
if (!delete_order($id))
	echo "failed deleting order abc<br/>";
delete_user(get_users_by_name("abc")[0]['user_id']);
delete_user(get_users_by_name("def")[0]['user_id']);
echo "Order tests finished !<br/>";
?>
