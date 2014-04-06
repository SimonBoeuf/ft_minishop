<?php
	function check_user_fields($fields)
	{
		foreach($fields as $key=>$val)
			$$key = $val;
		if((!isset($user_name)) || (strlen(trim($user_name)) < 1 || strlen($user_name) > 255))
			return (FALSE);
		if ((!isset($user_password)) || (strlen(trim($user_password)) < 1 || strlen($user_password) > 255))
			return (FALSE);
		if ((!isset($user_type)) || $user_type < 1 || $user_type > 2)
			return (FALSE);
		return (TRUE);
	}
?>