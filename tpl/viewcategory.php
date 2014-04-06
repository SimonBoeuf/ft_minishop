<?php
include_once("../includes/user_data.php");
include_once("../includes/category_data.php");
include("header.html");
if (!isset($_GET['cat_id']) || ($cat = get_cats_by_id($_GET['cat_id'])) == FALSE)
	echo "Please select a valid category";
else
{
	$cat = $cat[0];
	foreach($cat as $key=>$val)
		$$key = $val;
	$view = '<div id ="cat">';
	$view = '<p class="title">Category : '.$cat_name.'</p>';
	$view .='<p classe="description">Description : '.$cat_description.'</p>';
	$view .='</div>';
	echo $view;
}
include("footer.html");
?>
