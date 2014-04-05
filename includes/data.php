<?php
function connect_db()
{
	$mysqli = new mysqli("localhost", "root", "", "minishop");
	if ($mysqli->connect_errno)
	{
		echo "Database connection failed : ". mysqli_connect_error();
		return (FALSE);
	}
	return ($mysqli);
}
function insert($table, $fields)
{
	if ($mysqli = connect_db())
	{
		$firstrow = 1;
		$query = "INSERT INTO $table (";
		foreach($fields as $key=>$val)
		{
			if ($firstrow)
				$firstrow = 0;
			else
				$query .=", ";
			$query .= "$key";
		}
		$query .= ") VALUES (";
		$firstrow = 1;
		foreach($fields as $val)
		{
			if ($firstrow)
				$firstrow = 0;
			else
				$query .=", ";
			$query .= "$val";
		}
		$query .=");";
		if (!$mysqli->query($query))
			return (FALSE);
		else
			return (TRUE);
	}
}

function update($table, $fields, $where)
{
	if ($mysqli = connect_db())
	{
		$firstrow = 1;
		$query = "UPDATE $table SET ";
		foreach($fields as $key=>$val)
		{
			if ($firstrow)
				$firstrow = 0;
			else
				$query .=", ";
			$query .= "$key = $val";
		}
		$query .= " WHERE ";
		$firstrow = 1;
		foreach($where as $key=>$val)
		{
			if ($firstrow)
				$firstrow = 0;
			else
				$query .=" AND ";
			$query .= "$key = $val";
		}
		$query .= ";";
		if (!$mysqli->query($query))
			return (FALSE);
		else
			return (TRUE);
	}
}

function delete($table, $where)
{
	if ($mysqli = connect_db())
	{
		$firstrow = 1;
		$query = "DELETE FROM $table WHERE ";
		foreach($where as $key=>$val)
		{
			if ($firstrow)
				$firstrow = 0;
			else
				$query .=" AND ";
			$query .= "$key = $val";
		}
		$query .= " ORDERY BY ;";
		if (!$mysqli->query($query))
			return (FALSE);
		else
			return (TRUE);
	}
}

function get($table, $where, $order = NULL)
{
	if ($mysqli = connect_db())
	{
		$firstrow = 1;
		$query = "SELECT * FROM $table";
		if ($where)
		{
			$query .= " WHERE ";
			foreach($where as $key=>$val)
			{
				if ($firstrow)
					$firstrow = 0;
				else
					$query .=" AND ";
				$query .= "$key = $val";
			}
		}
		if ($order)
			$query .=" ORDER BY $order";
		$query .= ";";
		if (!$res = $mysqli->query($query))
			return (FALSE);
		else
			return ($res);
	}
}

function ret_data($res)
{
	if ($res)
	{
		while ($row = $res->fetch_assoc())
			$ret[] = $row;
	}
	else
		$ret = FALSE;
	return ($ret);
}
?>