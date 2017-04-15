<?php include("inc/products.php");

	if (isset($_GET["id"])) 
	{

		$product_id = $_GET["id"];

		if (isset($products[$product_id])) 
		{
			$product = $products[$product_id];
		}

	}

	if (!isset($product)) 
	{
		
		header("Location: shirts.php");

		exit();

	}

	$section = "shirts";
	$pageTitle = $product["name"];
	include("inc/header.php"); 

?>

<ol class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="/shirts.php">Shirts</a></li>
  <li class="active"><?php echo $product["name"]; ?></li>
</ol>

<div class="row">

	<div class="col-md-6">
		<span>
			<img height="400px" width="400px" src="<?php echo $product["img"]; ?>" alt="<?php echo $product["name"]; ?>">
		</span>
	</div>

	<div class="col-md-6">

		<form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="POST" role="form">
			<legend><h1>$<?php echo $product["price"] . ' ' . $product["name"]; ?></h1></legend>
		
			<div class="form-group">
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="hosted_button_id" value="<?php echo $product["paypal"]; ?>">
				<input type="hidden" name="item_name" value="<?php echo $product["name"]; ?>">
			</div>
		
			<div class="form-group">
				<label for="os0">Color</label>
				<input type="hidden" name="on0" value="Size">
				<select class="form-control" id="os0" name="os0">
					<?php foreach($product["sizes"] as $size) { ?>
					<option value="<?php echo $size; ?>"><?php echo $size; ?> </option>
					<?php } ?>
				</select>
			</div>
			
			<button type="submit" name="submit" class="btn btn-success">Add to Cart</button>
		</form>

	</div>

</div>

<?php include("inc/footer.php"); ?>