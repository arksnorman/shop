<?php

	class Login extends Controller
	{
		public function index()
		{
			$pageTitle = 'Login | ' . BRANDNAME;
			$page = "login";
			$errorList = [];

			if (Input::exists('POST'))
			{
				$username = Input::get('username');
				$password = Input::get('password');

				if (empty($username || $password))
				{
					$errorList = 'Please enter both username and password';
				}
			}

			require_once HEADER;
			require_once $this->view('login');
			require_once FOOTER;
		}
	}
