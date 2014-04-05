<?php
include("data.php");

function get_user_info($username)
{
	if ($mysqli = connect_db())
	{
		$res = $mysqli->query("SELECT user_id, user_name, user_type FROM users where user_name ='$username'");
		$row = $res->fetch_assoc();
		return $row;
	}
}

function check_params($username, $password)
{
	if ($mysqli = connect_db())
	{
		if (!$res = $mysqli->query("SELECT count(*) as numrows FROM users WHERE user_name ='$username' AND user_password = '$password';"))
			echo "Request failed : ".$mysqli->error;
		else
		{
			$row = $res->fetch_assoc();
			return ($row['numrows'] == 1);
		}
	}
}

function create_user($username, $password, $type)
{
	$table = 'users';
	$fields['user_name'] = "'".$username."'";
	$fields['user_password'] = "'".$password."'";
	$fields['user_type'] = $type;
	return (insert($table, $fields));
}

function update_user($id, $username, $password, $type)
{
	$table = 'users';
	$fields['user_name'] = "'".$username."'";
	$fields['user_password'] = "'".$password."'";
	$fields['user_type'] = $type;
	$where['user_id'] = $id;
	return (update($table, $fields, $where));
}

function delete_user($id)
{
	$table = 'users';
	$where['id'] = 3;
	return (delete($table, $where));
}

function get_users()
{
	$table = 'users';
	$where = NULL;
	$res = get($table, $where);
	return (ret_data(get($table, $where)));
}

function get_users_by_id($id)
{
	$table = 'users';
	$where['user_id'] = $id;
	return (ret_data(get($table, $where)));
}

function get_users_by_name($name)
{
	$table = 'users';
	$where['user_name'] = "'".$name."'";
	return (ret_data(get($table, $where)));
}

function get_users_by_type($type)
{
	$table = 'users';
	$where['user_type'] = $type;
	return (ret_data(get($table, $where)));
}
?>