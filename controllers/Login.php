<?php

	class Login extends Controller
	{
		public function index()
		{
			$pageTitle = 'Login | ' . BRANDNAME;
			$page = "login";
			$errorMessages = [];

			if (Input::exists('POST'))
			{
				$username = Input::get('username');
				$password = Input::get('password');

				if (empty($username || $password))
				{
					$errorMessages[] = 'Please enter both username and password';
				}
				else
				{
					if (User::login($username, $password))
					{
						Redirect::to('/home/');
					}
					else
					{
						$errorMessages[] = 'Invalid username or password';
					}
				}
			}

			require_once HEADER;
			require_once $this->view('login');
			require_once FOOTER;
		}
	}
