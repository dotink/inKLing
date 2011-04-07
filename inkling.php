<?php

	/**
	 * The inkling CSS class.  A PHP helper class, which, if you allow the running
	 * of PHP in your CSS can make common tasks easier.
	 *
	 * @author Matthew J. Sahagian [mjs] <gent@dotink.org>
	 * @copyright Copyright (c) 2011, Matthew J. Sahagian
	 * @license http://www.gnu.org/licenses/agpl.html GNU Affero General Public License
	 *
	 * @package inkling
	 */
	class CSS
	{

		static private $stored_values = array();

		final private function __construct()
		{
			// No Instantiation
		}

		/**
		 * Store a value in a key
		 *
		 * @param string $key The key name
		 * @param mixed $value The value
		 * @return void
		 */
		static public function store($key, $value)
		{
			self::$stored_values[$key] = $value;
		}

		/**
		 * Generate code for transparent backgrounds
		 *
		 * @param integer $r The red value to use 0 - 255
		 * @param integer $g The green value to use 0 - 255
		 * @param integer $b The blue value to use 0 - 255
		 * @param float $a The alpha value to use 0.00 - 1.00
		 * @return void
		 */
		static public function bgRGBA($r, $g, $b, $a)
		{

			$hex  = strtoupper(dechex($r) . dechex($g) . dechex($b));
			$aper = floor($a * 255);
			$ahex = strtoupper(dechex($aper)) . $hex;

			echo sprintf(('
				background-color: #%s;
				background-color: rgba(%s, %s, %s, %s);
				background-color: transparent\9;
				filter: progid:DXImageTransform.Microsoft.gradient (
					startColor="%s"
					endColor="%s"
				);
				zoom: 1;
			'),	$hex, $r, $g, $b, $a, $ahex, $ahex);
		}

	}

