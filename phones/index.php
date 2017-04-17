<?php 

	require_once $_SERVER['DOCUMENT_ROOT'] . '/core/init.php';
	
	$pageTitle = owner2 . " Full Catalog of SmartPhones";
	$page = "shirts";

	require_once functions;
	require_once header;

	echo "<div class='alert alert-success'><h1 class='text-center'>" . owner2 . " Full Catalog of SmartPhones</h1></div>";

	echo '<div class="row">';

	foreach($products as $product) 
	{ 
		echo get_list_view_html($product);
	}

	echo "</div>";

	require_once footer;

?>