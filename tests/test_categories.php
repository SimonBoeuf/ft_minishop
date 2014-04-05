<?php
include_once ("../includes/category_data.php");
if (!create_cat("abc", "bcd", 2))
	echo "failed creating cat abc<br/>";
if (!create_cat("def", "bcd", 2))
	echo "failed creating cat abd<br/>";
$res = get_cats_by_name("def");
$id = $res[0]['cat_id'];
$name = $res[0]['cat_name'];;
if (!update_cat($id, "abd", "efg", 2))
	echo "failed updating abd<br/>";
if (get_cats_by_id($id)[0]['cat_id'] != $id)
	echo "Failed retrieving id of abd</br>";
if (get_cats_by_name('bd')[0]['cat_name'] != 'abd')
	echo "Failed retrieving name of abd</br>";
if (get_cats_by_name('ab')[0]['cat_name'] != 'abc')
	echo "Failed retrieving name of abd</br>";
if (!delete_cat($id))
	echo "failed deleting cat abd<br/>";
$res = get_cats_by_name("abc");
$id = $res[0]['cat_id'];
if (!delete_cat($id))
	echo "failed deleting cat abc<br/>";
echo "Category tests finished !<br/>";
?>