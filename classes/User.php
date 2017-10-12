<?php

	class User
	{
		private static $user;

		public static function create(string $table, array $fields) :bool
		{
			return (Database::insert($table, $fields)) ? true : false;
		}

		public static function find(string $user) :bool
		{
			if ($user)
			{
				if (self::regular($user))
				{
					return self::regular($user);
				}
				return false;
			}
			return false;
		}

		public static function login(string $username = null, string $password = null)
		{
			if (self::find($username))
			{
				if (password_verify($password, self::$user['password']))
				{
					Token::generate('userId');
					Session::create('username', self::$user['username']);
					Token::generate('userToken');
					return true;
				}
			}
			return false;
		}

		public static function isLoggedIn()
		{
			return (Session::exists('userId') && Session::exists('userToken')) ? true : false;
		}

		public static function logout()
		{
			return Session::destroy();
		}

		public static function data($value)
		{
			if (self::find(Session::get('username')))
			{
				return self::$user[$value];
			}
			return '';
		}

		private static function regular(string $user)
		{
			$data = Database::fetchRow("SELECT * FROM users WHERE username = ? OR email = ?", [$user, $user]);
			if (count($data))
			{
				self::$user = $data;
				return true;
			}
			return false;
		}
	}
