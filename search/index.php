<?php

	require_once $_SERVER['DOCUMENT_ROOT'] . '/core/init.php'; 

	$pageTitle = 'Search ' . owner;
	$page = "search";

	require_once header;

	$searchItem = "";

	if (isset($_GET['q'])) 
	{
		$searchItem = trim($_GET['q']);

		if (!empty($searchItem)) 
		{
			require_once functions;

			$products = search($searchItem);			
		}

	}

?>

<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6 text-center">
		<div class="form">
			<form action="/search/" method="GET" role="form">
				<legend>Search Through <?php echo owner2; ?> SmartPhones</legend>
				<div class="form-group">
					<input type="text" class="form-control" name="q" id="" placeholder="Enter your search keyword here">
				</div>
				<button type="submit" name="submit" class="btn btn-info">Search</button>
			</form>
		</div>
	</div>
	<div class="col-md-3"></div>
</div>

<hr>

<div class="row">

	<?php 

		if (isset($searchItem) && !empty($searchItem))
		{
			if (!empty($products)) 
			{
				foreach ($products as $product) 
				{
					echo output($product);
				}	
			}
			else
			{
				echo '<br><div class="col-md-3"></div><div class="col-md-6 alert alert-info text-center"><p>No products were found matching that search term.</p></div><div class="col-md-3"></div>';
			}
		}

	?>

</div>

<?php	

	require_once footer;
	
?>

