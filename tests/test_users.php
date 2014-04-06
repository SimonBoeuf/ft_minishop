<?php
include_once ("../includes/user_data.php");
if (!create_user("abc", "bcd", 2))
	echo "failed creating user abc<br/>";
if (!create_user("def", "bcd", 2))
	echo "failed creating user abd<br/>";
$res = get_users_by_name("def");
$id = $res[0]['user_id'];
$name = $res[0]['user_name'];
$type = $res[0]['user_type'];
if (!update_user($id, "abd", "efg", 2))
	echo "failed updating abd<br/>";
if (!check_params("abd", "efg"))
	echo "Failed authenticating abd<br/>";
if (check_params("abd", "efd"))
	echo "Failed bad auth abd<br/>";
if (get_users_by_id($id)[0]['user_id'] != $id)
	echo "Failed retrieving id of abd</br>";
if (get_users_by_name('bd')[0]['user_name'] != 'abd')
	echo "Failed retrieving name of abd</br>";
if (get_users_by_name('ab')[0]['user_name'] != 'abc')
	echo "Failed retrieving name of abd</br>";
if (get_users_by_type($type)[0]['user_type'] != 2)
	echo "Failed retrieving type of abd</br>";
if (!delete_user($id))
	echo "failed deleting user abd<br/>";
$res = get_users_by_name("abc");
$id = $res[0]['user_id'];
if (!delete_user($id))
	echo "failed deleting user abc<br/>";
echo "User tests finished !<br/>";
?>
