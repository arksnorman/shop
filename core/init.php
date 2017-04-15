<?php

	/**
	* Report simple running errors
	*/
	error_reporting(E_ALL);

	/**
	* Display errors on screen
	*/
	ini_set('display_errors', 1);

	/**
	* Define root path i.e /var/www/student-information-system
	*/

	define('rootPath', $_SERVER['DOCUMENT_ROOT']);
	
	require_once rootPath . '/includes/definitions.php';	

?>