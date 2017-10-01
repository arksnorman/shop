<?php

	class Home extends Controller
	{
		public function index()
		{
			$latestPhones = Database::fetchAll('SELECT name,id,img  FROM products ORDER BY id DESC LIMIT 0,4');
			$pageTitle = 'Home | ' . BRANDNAME;
			$page = "home";
			require_once HEADER;
			require_once $this->view('home');
			require_once FOOTER;
		}
	}
