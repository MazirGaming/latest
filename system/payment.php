<?php

/**
 * Vvveb
 *
 * Copyright (C) 2022  Ziadin Givan
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 *
 */

namespace Vvveb\System;

use Vvveb\System\Cart\Cart;

class Payment {
	private $driver;

	private $methods = [];

	public static function getInstance($options = []) {
		static $inst = null;

		if ($inst === null) {
			$inst   = new Payment($options);
		}

		return $inst;
	}

	public function __construct($options = []) {
	}

	public function getMethods() {
		$data = [];

		foreach ($this->methods as $name => $class) {
			$obj         = new $class(Cart::getInstance());
			$paymentData = $obj->getMethod();
			//if payment method returns false or no data then don't add it to the list
			if ($paymentData) {
				$data[$name] = $obj->getMethod();
			}
		}

		return $data;
	}

	public function registerMethod($method, $class) {
		$this->methods[$method] = $class;
	}
}
