<?php
include_once("data.php");

function create_order_detail($order, $product)
{
	$table = 'orders_details';
	$fields['order_id'] = $order;
	$fields['order_product'] = $product;
	return (insert($table, $fields));
}

function update_order_detail($id, $order, $product)
{
	$table = 'orders_details';
	$fields['order_id'] = $order;
	$fields['order_product'] = $product;
	$where['order_details_id'] = $id;
	return (update($table, $fields, $where));
}

function delete_order_detail($id)
{
	$table = 'orders_details';
	$where['order_details_id'] = $id;
	return (delete($table, $where));
}

function get_orders_details()
{
	$table = 'orders_details';
	$where = NULL;
	$res = get($table, $where);
	return (ret_data(get($table, $where)));
}

function get_orders_details_by_id($id, $order = NULL)
{
	$table = 'orders_details';
	$where['order_details_id'] = $id;
	return (ret_data(get($table, $where)));
}

function get_orders_details_by_product($product)
{
	$table = 'orders_details';
	$where['order_product'] = $product;
	return (ret_data(get($table, $where)));
}

function get_orders_details_by_order($order)
{
	$table = 'orders_details';
	$where['order_id'] = $order;
	return (ret_data(get($table, $where)));
}

?>
