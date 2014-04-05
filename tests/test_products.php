<?php
include_once ("../includes/product_data.php");
if (!create_product("abc", "bcd",1, 2))
	echo "failed creating product abc<br/>";
if (!create_product("def", "bcd",10, 2))
	echo "failed creating product abd<br/>";
$res = get_products_by_name("def");
$id = $res[0]['product_id'];
$name = $res[0]['product_name'];;
if (!update_product($id, "abd", "efg", 20, 2))
	echo "failed updating abd<br/>";
if (get_products_by_id($id)[0]['product_id'] != $id)
	echo "Failed retrieving id of abd</br>";
if (get_products_by_name('bd')[0]['product_name'] != 'abd')
	echo "Failed retrieving name of abd</br>";
if (get_products_by_name('ab')[0]['product_name'] != 'abc')
	echo "Failed retrieving name of abd</br>";
if (get_products_by_min_price(10)[0]['product_name'] != 'abd')
	echo "Failed retrieving min price of abd</br>";
if (get_products_by_max_price(10)[0]['product_name'] != 'abc')
	echo "Failed retrieving max price of abc</br>";
if (get_products_by_ranged_price(0, 20)[0]['product_name'] != 'abc' && get_products_by_ranged_price(0, 20)[1]['product_name'] != 'abd')
	echo "Failed retrieving ranged price of abc and abd</br>";
if (!delete_product($id))
	echo "failed deleting product abd<br/>";
$res = get_products_by_name("abc");
$id = $res[0]['product_id'];
if (!delete_product($id))
	echo "failed deleting product abc<br/>";
echo "Product tests finished !<br/>";
?>