<?php
include_once("data.php");

function get_user_info($username)
{
	if ($mysqli = connect_db())
	{
		$res = mysqli_query($mysqli, "SELECT user_id, user_name, user_type FROM users where user_name ='$username'");
		$row = mysqli_fetch_assoc($res);
		return $row;
	}
}

function check_params($username, $password)
{
	if ($mysqli = connect_db())
	{
		$query = "SELECT count(*) as numrows FROM users WHERE user_name ='$username' AND user_password = '".hash(whirlpool, $password)."';";
		if (!$res = mysqli_query($mysqli, $query))
			echo "Request failed : ".mysqli_error($mysqli);
		else
		{
			$row = mysqli_fetch_assoc($res);
			return ($row['numrows'] == 1);
		}
	}
}

function create_user($username, $password, $type)
{
	$table = 'users';
	$fields['user_name'] = "'".$username."'";
	$fields['user_password'] = "'".hash(whirlpool, $password)."'";
	$fields['user_type'] = $type;
	return (insert($table, $fields));
}

function update_user($id, $username, $password, $type)
{
	$table = 'users';
	$fields['user_name'] = "'".$username."'";
	$fields['user_password'] = "'".hash(whirlpool, $password)."'";
	$fields['user_type'] = $type;
	$where['user_id'] = $id;
	return (update($table, $fields, $where));
}

function delete_user($id)
{
	$table = 'users';
	$where['user_id'] = $id;
	return (delete($table, $where));
}

function get_users()
{
	$table = 'users';
	$where = NULL;
	$res = get($table, $where);
	return (ret_data(get($table, $where)));
}

function get_users_by_id($id, $order = NULL)
{
	$table = 'users';
	$where['user_id'] = $id;
	return (ret_data(get($table, $where)));
}

function get_users_by_name($name, $order = NULL, $like = 1)
{
	$table = 'users';
	$where['user_name'] = "'".$name."'";
	return (ret_data(get($table, $where, $order, $like)));
}

function get_users_by_type($type)
{
	$table = 'users';
	$where['user_type'] = $type;
	return (ret_data(get($table, $where)));
}
?>
