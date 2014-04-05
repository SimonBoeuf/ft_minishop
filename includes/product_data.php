<?php
include_once("data.php");

function create_product($name, $desc, $price, $category)
{
	$table = 'products';
	$fields['product_name'] = "'".$name."'";
	$fields['product_description'] = "'".$desc."'";
	$fields['product_price'] = $price;
	$fields['product_category'] = $category;
	return (insert($table, $fields));
}

function update_product($id, $name, $desc, $price, $category)
{
	$table = 'products';
	$fields['product_name'] = "'".$name."'";
	$fields['product_description'] = "'".$desc."'";
	$fields['product_category'] = $category;
	$fields['product_price'] = $price;
	$where['product_id'] = $id;
	return (update($table, $fields, $where));
}

function delete_product($id)
{
	$table = 'products';
	$where['product_id'] = $id;
	return (delete($table, $where));
}

function get_products()
{
	$table = 'products';
	$where = NULL;
	$res = get($table, $where);
	return (ret_data(get($table, $where)));
}

function get_products_by_id($id, $order = NULL)
{
	$table = 'products';
	$where['product_id'] = $id;
	return (ret_data(get($table, $where)));
}

function get_products_by_name($name, $order = NULL, $like = 1)
{
	$table = 'products';
	$where['product_name'] = "'".$name."'";
	return (ret_data(get($table, $where, $order, $like)));
}

function get_products_by_desc($desc)
{
	$table = 'products';
	$where['product_description'] = "'".$desc."'";
	return (ret_data(get($table, $where, 1)));
}

function get_products_by_category($cat)
{
	$table = 'products';
	$where['product_category'] = $cat;
	return (ret_data(get($table, $where, 1)));
}

function get_products_by_min_price($price)
{
	$table = 'products';
	$fields['product_price'] = $price;
	return (ret_data(get_higher_than($table, $fields)));
}

function get_products_by_max_price($price)
{
	$table = 'products';
	$fields['product_price'] = $price;
	return (ret_data(get_lower_than($table, $fields)));
}

function get_products_by_ranged_price($min, $max)
{
	$table = 'products';
	$fields['product_price']['min'] = $min;
	$fields['product_price']['max'] = $max;
	return (ret_data(get_between($table, $fields)));
}
?>