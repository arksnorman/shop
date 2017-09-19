<?php

	class Phone extends Controller
	{
		public function index(int $phone = null)
		{
			$phoneId = isset($phone) ? $phone : '';

			if (isset($phoneId) && is_int($phoneId))
			{
				$productId = $phoneId;
				$queryString = "SELECT * FROM products WHERE id = ?";
				$product = Database::getInstance()->query($queryString, [$productId])->resultsAll();
				if (count($product))
				{
					$queryString = "SELECT * FROM specifications WHERE product_id = ?";
					$phoneDetails = Database::getInstance()->query($queryString, [$productId])->resultsAll()[0];
					$product = $product[0];
					$pageTitle = $product["name"];
					require_once HEADER;
					require_once $this->view('phone');
					require_once FOOTER;
				}
			}
			// return Redirect::to();

		}
	}