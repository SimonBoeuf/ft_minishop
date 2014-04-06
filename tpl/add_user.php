<?php
session_start();
include ("./header.html");
include ("../check_fields.php");
include ("../includes/user_data.php");
if ($_SESSION['user_info']['user_type'] != 1)
	echo "Please login as root to see this page.";
else
{
	if (isset($_POST['adduser']) && check_user_fields($_POST))
	{
		foreach($_POST as $key=>$val)
			$$key = $val;
		if ($action == 1)
		{
			if (create_user($user_name, $user_password, $user_type))
				echo "User successfully created !";
			else
				echo "Sorry, something went wrong... Try again later ?";
		}
		elseif ($action == 2)
		{
			if (update_user($user_id, $user_name, $user_password, $user_type))
				echo "User successfully updated !";
			else
				echo "Sorry, something went wrong... Try again later ?";				
		}
		echo '<a href="../index.php">Go back to admin home</a>';
	}
	else
	{
		if (isset($_GET['action']) && $_GET['action'] == 3)
		{
				if (delete_user($_GET['user_id']))
					echo "User deleted !";
				else
					echo "Oops, could not delete !";
				echo '<a href="../index.php">Go back to admin home</a>';
		}
		else
		{
			if (isset($_POST['adduser']))
				echo "You must have been wrong somewhere...";
			$action = 1;
			$user_id = 0;
			$user_name = "";
			$user_password = "";
			$user_type = 0;
			if (isset($_GET['user_id']))
			{
				$action = 2;
				$user = get_users_by_id($_GET['user_id'])[0];
				foreach($user as $key=>$val)
					$$key = $val;
			}
			$form = '<form action="#" method="POST" name="adduserform">';
			$form .='<input type="hidden" name="user_id" value="'.$user_id.'" />';
			$form .= 'Login : <input type="text" name="user_name" value ="'.$user_name.'" />';
			$form .= 'Password : <input type="text" name="user_password" />';
			$form .= 'Type : <select name="user_type"><option value="1" ';
			if ($user_type == 1)
				$form .= 'selected="selected" ';
			$form .= '>Root</option><option value="2" ';
			if ($user_type == 2)
				$form .= 'selected="selected" ';
			$form .='>User</option></select>';
			$form .='<input type="hidden" name="action" value="'.$action.'" />';
			$form .= '<input type="submit" name="adduser" value="Ok !"/>';
			$form .= '</form>';
			$form .= '<form action="../index.php" method="POST"><input type="submit" value="Cancel"/></form>';
			echo $form;
		}
	}
}
include ("./footer.html");
?>
