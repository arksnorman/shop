<?php

	class Receipt extends Controller
	{
		public function index()
		{
			$pageTitle = "Thank you for your order!";
			$page = "none";
			require_once HEADER;
			require_once $this->view('receipt');
			require_once FOOTER;
		}
	}
