<?php

	class Database
	{
		private static $instance = null;
		private static $connection = null;
		private	static $query;
		private	static $error = false;
		private	static $resultsAll;
		private	static $count = 0;
		private static $resultsSingle;

		private static function connect()
		{
			try
			{
				self::$connection = new PDO(DBDRIVER.":host=".DBHOST.";dbname=".DBNAME.";port=".DBPORT."", DBUSERNAME, DBPASS, [ PDO::ATTR_PERSISTENT => true ]);
				self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			catch (PDOException $e)
			{
				die($e->getMessage());
			}
			return new static;
		}

		public static function getInstance()
		{
			if (!isset(self::$instance))
			{
				self::$instance = self::connect();
			}
			return self::$instance;
		}

		public static function query($sql, $params = [])
		{
			self::$error = false;

			if (self::$query = self::$connection->prepare($sql))
			{
				$x = 1;

				if (count($params))
				{
					foreach ($params as $param)
					{
						self::$query->bindValue($x, $param);
						$x++;
					}
				}

				if (self::$query->execute())
				{
					self::$resultsAll 	= self::$query->fetchAll(PDO::FETCH_ASSOC);
					self::$count = self::$query->rowCount();
					self::$resultsSingle = self::$query->fetch(PDO::FETCH_ASSOC);
				}
				else
				{
					self::$error = true;
				}
				return new static;
			}
		}

		private static function action($action, $table, $where = [])
		{
			if (count($where) === 3)
			{
				$operators = array('=', '>', '<', '>=', '<=');
				$field = $where[0];
				$operator = $where[1];
				$value = $where[2];

				if (in_array($operator, $operators))
				{
					$sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";

					if (!self::getInstance()->query($sql, array($value))->error())
					{
						return new static;
					}
				}
			}
			return false;
		}

		public static function getWhere($table, $where = [])
		{
			return self::action('SELECT *', $table, $where)->results();
		}

		public static function getAll($table)
		{
			return self::getInstance()->query("SELECT * FROM {$table}")->results();
		}

		public static function delete($table, $where)
		{
			return self::action('DELETE', $table, $where);
		}

		public static function insert($table, $fields = [])
		{
			if (count($fields))
			{
				$keys = array_keys($fields);
				$values = '';
				$x = 1;

				foreach ($fields as $field)
				{
					$values .= '?';

					if ($x < count($fields))
					{
						$values .= ', ';
						$x++;
					}
				}

				$queryString = "INSERT INTO {$table} (" . implode(', ', $keys) . ") VALUES ({$values})";

				if (!self::getInstance()->query($queryString, $fields)->error())
				{
					return true;
				}
			}
			return false;
		}

		public function error()
		{
			return self::$error;
		}

		public function count()
		{
			return self::$count;
		}

		public function resultsAll()
		{
			return self::$resultsAll;
		}

		public function resultsSingle()
		{
			return self::$resultsSingle;
		}
	}
