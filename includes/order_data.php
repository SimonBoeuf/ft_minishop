<?php
include_once("data.php");

function create_order($user)
{
	$table = 'orders';
	$fields['order_user'] = $user;
	return (insert($table, $fields));
}

function update_order($id, $user)
{
	$table = 'orders';
	$fields['order_user'] = $user;
	$where['order_id'] = $id;
	return (update($table, $fields, $where));
}

function delete_order($id)
{
	$table = 'orders';
	$where['order_id'] = $id;
	return (delete($table, $where));
}

function get_orders()
{
	$table = 'orders';
	$where = NULL;
	$res = get($table, $where);
	return (ret_data(get($table, $where)));
}

function get_orders_by_id($id, $order = NULL)
{
	$table = 'orders';
	$where['order_id'] = $id;
	return (ret_data(get($table, $where)));
}

function get_orders_by_user($user)
{
	$table = 'orders';
	$where['order_user'] = $user;
	return (ret_data(get($table, $where, 'order_id DESC')));
}

?>
