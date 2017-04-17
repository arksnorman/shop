<?php

	require_once $_SERVER['DOCUMENT_ROOT'] . '/core/init.php';

	$pageTitle = "Thank you for your order!";
	$page = "none";

	require_once header;

	echo '

	<div class="row">

	<div class="col-md-4"></div>

	<div class="col-md-4 text-center">

	<div class="alert alert-success"><h1>Thank You!</h1></div>

	<div class="well">

	<p>Thank you for your payment. Your transaction has been completed, and a receipt for your purchase has been emailed to you. </p>

	<p>Need another smartphone already? Visit the <a href="/phones">SmartPhone Full Catalog</a> page again.</p>
	</div>
	<div class="col-md-4"></div>
	</div>
	</div>';

	require_once footer; 

?>