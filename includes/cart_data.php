<?php
include_once("data.php");

function create_cart($user, $product)
{
	$table = 'cart';
	$fields['cart_user'] = $user;
	$fields['cart_product'] = $product;
	return (insert($table, $fields));
}

function update_cart($id, $user, $product)
{
	$table = 'cart';
	$fields['cart_user'] = $user;
	$fields['cart_product'] = $product;
	$where['cart_id'] = $id;
	return (update($table, $fields, $where));
}

function delete_cart($id)
{
	$table = 'cart';
	$where['cart_id'] = $id;
	return (delete($table, $where));
}

function get_carts()
{
	$table = 'cart';
	$where = NULL;
	$res = get($table, $where);
	return (ret_data(get($table, $where)));
}

function get_carts_by_id($id, $order = NULL)
{
	$table = 'cart';
	$where['cart_id'] = $id;
	return (ret_data(get($table, $where)));
}

function get_carts_by_user($user)
{
	$table = 'cart';
	$where['cart_user'] = $user;
	return (ret_data(get($table, $where)));
}

function get_carts_by_product($product)
{
	$table = 'cart';
	$where['cart_product'] = $product;
	return (ret_data(get($table, $where)));
}

function is_product_in_cart($user, $product)
{
	$table = 'cart';
	$where['cart_user'] = $user;
	$where['cart_product'] = $product;
	if (mysqli_fetch_assoc(get_count($table, $where))['count'] == 0)
		return (FALSE);
	else
		return (TRUE);
}
?>
