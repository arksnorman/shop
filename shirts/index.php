<?php 

	require_once $_SERVER['DOCUMENT_ROOT'] . '/core/init.php';
	
	$pageTitle = owner2 . " Full Catalog of SmartPhones";
	$page = "shirts";

	require_once products;
	require_once header;

?>

<div class="section shirts page">

	<div class="wrapper">

		<h1><?php echo owner2; ?> Full Catalog of SmartPhones</h1>

		<ul class="products">
			<?php foreach($products as $product_id => $product) { 
					echo get_list_view_html($product_id,$product);
				}
			?>
		</ul>

	</div>

</div>

<?php require_once footer; ?>