<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo $pageTitle; ?></title>
		<link rel="shortcut icon" href="/img/favicon.ico">
		<link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="/css/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="/css/style.css">
	</head>
	<body>		
	<!--Navbar Start -->
		<nav class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand <?php if ($page == "home") { echo 'class="active"'; } ?>" href="/"><?php echo owner; ?></a>
				</div>
		
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav">
						<li <?php if ($page == "phones") { echo 'class="active"'; } ?>><a href="/phones">SmartPhones</a></li>
						<li <?php if ($page == "search") { echo 'class="active"'; } ?>><a href="/search"><i class="fa fa-search"></i> Search</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li <?php if ($page == "contact") { echo 'class="active"'; } ?>><a href="/contact"><i class="fa fa-phone"></i> Contact</a></li>
						<li><a target="paypal" href="https://www.paypal.com/cgi-bin/webscr?cmd=_cart&amp;business=Q6NFNPFRBWR8S&amp;display=1"><i class="fa fa-shopping-cart"></i> Shopping Cart</a></li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div>
		</nav>

	<!--Navbar end -->
