<?php
include_once("data.php");

function create_cat($name, $desc)
{
	$table = 'categories';
	$fields['cat_name'] = "'".$name."'";
	$fields['cat_description'] = "'".$desc."'";
	return (insert($table, $fields));
}

function update_cat($id, $name, $desc)
{
	$table = 'categories';
	$fields['cat_name'] = "'".$name."'";
	$fields['cat_description'] = "'".$desc."'";
	$where['cat_id'] = $id;
	return (update($table, $fields, $where));
}

function delete_cat($id)
{
	$table = 'categories';
	$where['cat_id'] = $id;
	return (delete($table, $where));
}

function get_cats()
{
	$table = 'categories';
	$where = NULL;
	$res = get($table, $where);
	return (ret_data(get($table, $where)));
}

function get_cats_by_id($id, $order = NULL)
{
	$table = 'categories';
	$where['cat_id'] = $id;
	return (ret_data(get($table, $where)));
}

function get_cats_by_name($name, $order = NULL, $like = 1)
{
	$table = 'categories';
	$where['cat_name'] = "'".$name."'";
	return (ret_data(get($table, $where, $order, $like)));
}

function get_cats_by_desc($desc)
{
	$table = 'categories';
	$where['cat_description'] = "'".$desc."'";
	return (ret_data(get($table, $where, 1)));
}
?>