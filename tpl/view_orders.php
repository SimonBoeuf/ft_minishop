<?php
session_start();
$root = $_SERVER['DOCUMENT_ROOT'];
include ("$root/tpl/header.html");
include ("$root/check_fields.php");
include ("$root/includes/user_data.php");
include ("$root/includes/product_data.php");
include ("$root/includes/order_data.php");
include ("$root/includes/order_detail_data.php");
if ($_SESSION['user_info']['user_type'] != 1)
	echo "Please login as root to see this page.";
else
{
	$orders = get_orders_by_user($_GET['user_id']);
	foreach($orders as $order)
	{
		foreach ($order as $key=>$val)
			$$key = $val;
		$table = '<table border=1><th colspan=3>Order '.$order_id.'</th>';
		$details = get_orders_details_by_order($order_id);
		foreach ($details as $detail)
		{
			foreach ($detail as $key=>$val)
				$$key = $val;
			$product_name = get_products_by_id($order_product)[0]['product_name'];
			$table .='<tr><td colspan=2>'.$product_name.'</td></tr>';
		}
		$table .= '</table>';
		echo $table;
	}
	echo '<br /><a href="/index.php">Home</a>';
}
include ("./footer.html");
?>
