<?php

	class Phone extends Controller
	{
		public function index(int $phone = null)
		{
			$phoneId = isset($phone) ? $phone : '';

			if (isset($phoneId) && is_int($phoneId))
			{
				$productId = $phoneId;
				$product = Database::fetchRow('SELECT * FROM products WHERE id = ?', [$phoneId]);
				if (count($product))
				{
					$phoneDetails = Database::fetchRow('SELECT * FROM specifications WHERE product_id = ?', [$productId]);
					$pageTitle = $product["name"];
					require_once HEADER;
					require_once $this->view('phone');
					require_once FOOTER;
				}
			}
		}
	}
