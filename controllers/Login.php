<?php

	class Login extends Controller
	{
		public function index()
		{
			$pageTitle = 'Login | ' . BRANDNAME;
			$page = "login";
			require_once HEADER;
			require_once $this->view('login');
			require_once FOOTER;
		}
	}
