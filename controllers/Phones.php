<?php

	class Phones extends Controller
	{
		public function index()
		{
			$queryString = 'SELECT name,id,img  FROM products ORDER BY id';
			$allPhones = Database::getInstance()->query($queryString)->resultsAll();
			$pageTitle = BRANDNAME . " full Catalog of Smartphones";
			$page = "phones";
			require_once HEADER;
			require_once $this->view('phones');
			require_once FOOTER;
		}
	}
