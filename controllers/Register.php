<?php

	class Register extends Controller
	{
		public function index()
		{
			if (Input::exists('POST'))
			{
				$errorMessages	= [];
				$firstname 	= strtolower(Input::get('firstname'));
				$lastname 	= strtolower(Input::get('lastname'));
				$username 	= strtolower(Input::get('username'));
				$email		= strtolower(Input::get('email'));
				$password 	= Input::get('password');
				$password1 	= Input::get('password1');
				$number 	= Input::get('number');
				$address 	= Input::get('address');
				$city 		= strtolower(Input::get('city'));
				$state 		= strtolower(Input::get('state'));
				$zip 		= Input::get('zip');

				if (!in_array('', $_POST))
				{
					if (User::find($user))
					{
						$errorMessages[] = 'Username already taken';
					}
					if (User::find($email))
					{
						$errorMessages[] = 'Email already taken. Please choose another one';
					}
					if (strlen($firstname) < 2 || strlen($lastname) < 2)
					{
						$errorMessages[] = 'Enter a valid firstname and lastname. Min length is 2';
					}
					if (!filter_var($email, FILTER_VALIDATE_EMAIL))
					{
						$errorMessages[] = 'Enter a valid email address';
					}
					if (strlen($username) < 5)
					{
						$errorMessages[] = 'Username must have a min length of 5'; 
					}
					if (strlen($password) < 5) 
					{
						$errorMessages[] = 'Password must have a min length of 5'; 
					}
					if ($password != $password1) 
					{
						$errorMessages[] = 'Passwords do not match'; 
					}
					if (strlen($number) < 10)
					{
						$errorMessages[] = 'Please enter a valid phone number';
					}
					if (strlen($city) < 3 || strlen($state) < 3 || strlen($zip) < 3)
					{
						$errorMessages[] = 'Enter a valid city, state and zip code. Min length is 3';
					}
					if (!count($errorMessages))
					{
						$data = [
							'firstname' => ($firstname),
							'lastname'	=> ($lastname),
							'username'	=> ($username),
							'email'		=> ($email),
							'password'	=> password_hash($password, PASSWORD_DEFAULT),
							'number'	=> $number,
							'address'	=> $address,
							'city'		=> ($city),
							'state'		=> ($state),
							'zip'		=> $zip
						];
						if (Database::insert('users', $data))
						{
							return User::login(strtolower($username), $password) ? Redirect::to('/home/') : $errorMessages[] = 'There was a problem loggin in. Try again later or contact us';
						}
						else
						{
							$errorMessages[] = 'Server error: Registration failed. Try again later';
						}
					}
				}
				else
				{
					$errorMessages[] = 'Please fill in all fields';
				}				
			}

			$pageTitle = 'Register | ' . BRANDNAME;
			$page = "register";
			require_once HEADER;
			require_once $this->view('register');
			require_once FOOTER;
		}
	}
