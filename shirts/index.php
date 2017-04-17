<?php 

	require_once $_SERVER['DOCUMENT_ROOT'] . '/core/init.php';
	
	$pageTitle = owner2 . " Full Catalog of SmartPhones";
	$page = "shirts";

	require_once products;
	require_once header;

	echo "<h1 class='text-center'>" . owner2 . " Full Catalog of SmartPhones</h1>";

	echo '<div class="row">';

	foreach($products as $product_id => $product) 
	{ 
		echo get_list_view_html($product_id,$product);
	}

	echo "</div>";

	require_once footer;

?>