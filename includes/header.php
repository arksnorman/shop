<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?=$pageTitle;?></title>
	<link rel="shortcut icon" href="img/favicon.ico">
	<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/assets/css/custom.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand" href="#"><?=BRANDNAME;?></a>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/phones/"><i class="fa fa-mobile"></i> All Phones</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/search/"><i class="fa fa-search"></i> Search</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/contact/"><i class="fa fa-phone"></i> Contact</a>
            </li>
        </ul>
        <ul class="navbar-nav">
        	<li class="nav-item">
                <a class="nav-link" href="/cart/"><i class="fa fa-shopping-cart"></i> Shopping Cart</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/login/"><i class="fa fa-sign-in"></i> Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/register/"><i class="fa fa-registered"></i> Register</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container">
