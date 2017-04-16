<?php 

	require_once $_SERVER['DOCUMENT_ROOT'] . '/core/init.php';
	
	$pageTitle = owner2 . " Full Catalog of SmartPhones";
	$page = "shirts";

	require_once products;
	require_once header;

	echo "<h1>" . owner2 . " Full Catalog of SmartPhones</h1>";

	foreach($products as $product_id => $product) 
	{ 
		echo get_list_view_html($product_id,$product);
	}

	require_once footer;

?>