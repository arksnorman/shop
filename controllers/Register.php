<?php

	class Register extends Controller
	{
		public function index()
		{
			$pageTitle = 'Register | ' . BRANDNAME;
			$page = "register";
			require_once HEADER;
			require_once $this->view('register');
			require_once FOOTER;
		}
	}
