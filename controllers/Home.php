<?php

	class Home extends Controller
	{
		public function index()
		{
			$queryString = 'SELECT name,id,img  FROM products ORDER BY id DESC LIMIT 0,4';
			$latestPhones = Database::getInstance()->query($queryString)->resultsAll();
			$pageTitle = 'Home | ' . BRANDNAME;
			$page = "home";
			require_once HEADER;
			require_once $this->view('home');
			require_once FOOTER;
		}
	}