<?php

	class Database
	{
		const SINGLE = 1;
		const ROW = 2;
		const ALL = 3;
		const AFFECTED = 4;
		const IDENTIFIER = 5;
		private static $connection = null;

		private static function connect()
		{
			try
			{
				$conn = new PDO(DBDRIVER.":host=".DBHOST.";dbname=".DBNAME.";port=".DBPORT."", DBUSERNAME, DBPASS, [ PDO::ATTR_PERSISTENT => true ]);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$conn->exec('SET NAMES UTF8');
			}
			catch (PDOException $e)
			{
				die('Cant connect to database: '. $e->getMessage());
			}
			return $conn;
		}

		public static function getInstance() :PDO
		{
			if (!isset(self::$connection))
			{
				self::$connection = self::connect();
			}
			return self::$connection;
		}

		public static function query(string $sql, array $values = [], string $mode = null)
		{
			$statement = self::getInstance()->prepare($sql);
			if ($statement->execute($values))
			{
				if ($mode == null)
				{
					return true;
				}
				if ($mode == self::SINGLE)
				{
					return $statement->fetchColumn();
				}
				if ($mode == self::ROW)
				{
					return $statement->fetch(PDO::FETCH_ASSOC);
				}
				if ($mode == self::AFFECTED)
				{
					return $statement->rowCount();
				}
				if ($mode == self::IDENTIFIER)
				{
					return $this->connection->lastInsertId();
				}
				if ($mode = self::ALL)
				{
					return $statement->fetchAll(PDO::FETCH_ASSOC);
				}
			}
			return false;
		}

		public static function fetchAll(string $string, array $values = []) :array
		{
			return self::query($string, $values, self::ALL);
		}

		public static function fetchRow(string $string, array $values = []) :array
		{
			$fetchedData = self::query($string, $values, self::ROW);
			return $fetchedData ? $fetchedData : [];
		}

		public static function rowCount(string $string, array $values = []) :int
		{
			return self::query($string, $values, self::AFFECTED);
		}

		public static function insert(string $table, array $params) :bool
		{
			if (count($params))
			{
				$keys = array_keys($params);
				$values = '';
				$x = 1;
				foreach ($params as $param)
				{
					$values .= '?';

					if ($x < count($params))
					{
						$values .= ', ';
						$x++;
					}
				}
				$sql = "INSERT INTO {$table} (" . implode(', ', $keys) . ") VALUES ({$values})";
				return (self::query($sql, array_values($params))) ? true : false;
			}
			return false;
		}
	}
