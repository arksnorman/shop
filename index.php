<?php

	require_once $_SERVER['DOCUMENT_ROOT'] . '/core/init.php'; 

	$pageTitle = owner . " | Home";
	$page = "home";

	require_once functions;
	require_once header;

	echo '<div class="alert alert-success"><h1 class="text-center">' . owner . ' Latest Phones</h1></div>';
	echo '<div class="row">';

	$list_view_html = "";

	foreach($recent as $product) 
	{ 		
		$list_view_html = get_list_view_html($product) . $list_view_html;
	}

	echo $list_view_html;

	echo "</div>";

	require_once footer;
	
?>