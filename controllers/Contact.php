<?php

	class Contact extends Controller
	{
		public function index(string $message = null)
		{
			$page = 'contact';
			$pageTitle = 'Contact | ' . BRANDNAME;
			$to = SUPPORTMAIL;
			$sucess = isset($message) && $message = 'sucess' ? 'sucess' : null;

			if (Input::exists('POST'))
			{
			    $name = Input::get('name');
			    $email = Input::get('email');
			    $message = Input::get('message');
			    $errorMessages = [];

			    if ($name == "" || $email == "" || $message == "")
			    {
			       $errorMessages[] = "You must specify a value for name, email address, and message.";
			    }

			    foreach ($_POST as $value)
			    {
			        if(stripos($value,'Content-Type:') !== FALSE )
			        {
			            $errorMessages[] = "There was a problem with the information you entered.";
			        }
			    }

			    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
			    {
			        $errorMessages[] = "You must specify a valid email address.";
			    }

			    if (count($errorMessages) == 0)
			    {
				    if (mail($to, $email, $message, $name))
				    {
				    	Redirect::to('/contact/sucess/');
				    	exit;
				    }
				    else
				    {
				    	$errorMessages[] = "There was a problem sending the email";
				    }
				}
			}

			require_once HEADER;
			require_once $this->view('contact');
			require_once FOOTER;
		}
	}