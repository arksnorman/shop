<?php 
	$pageTitle = owner . " | Home";
	$section = "home";
	include('inc/header.php'); 
	include("inc/products.php");
?>

<h1 class="text-center"><?php echo owner; ?> Latest Phones</h1>
<div class="row">

	<?php 

		$total_products = count($products);
		$position = 0;
		$list_view_html = "";
		foreach($products as $product_id => $product) { 
			$position = $position + 1;
			if ($total_products - $position < 4) {
				$list_view_html = get_list_view_html($product_id,$product) . $list_view_html;
			}
		}
		echo $list_view_html;
	?>								
</div>

<?php include('inc/footer.php') ?>