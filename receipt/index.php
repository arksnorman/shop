<?php

	require_once $_SERVER['DOCUMENT_ROOT'] . '/core/init.php';

	$pageTitle = "Thank you for your order!";
	$page = "none";

	require_once header;

?>

<div class="section page">

	<div class="wrapper">

		<h1>Thank You!</h1>

		<p>Thank you for your payment. Your transaction has been completed, and a receipt for your purchase has been emailed to you. You may log into your account at <a href="http://www.paypal.com/us">www.paypal.com/us</a> to view details of this transaction.</p>

		<p>Need another smartphone already? Visit the <a href="/shirts.php">SmartPhone Full Catalog</a> page again.</p>

	</div>

</div>

<?php require_once footer; ?>