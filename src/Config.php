<?php
/**
 * Created by PhpStorm.
 * User: Wolf
 * Date: 3/10/2016
 * Time: 13:14
 *
 * Static class for configuring access to the PIM API.
 */

namespace PIM;

class Configuration
{
	private static $token = null;

	/**
	 * Initially sets the access token to be used by all calls to the PIM API.
	 *
	 * @param $token A valid API token to access the PIM API.
	 * @throws InvalidArgumentException
	 */
	public static function setAccessToken($token) {

		// Throw a friendly exception if the token isnt supplied in the correct format
		if ($token !== null && (!is_string($token) || !preg_match('/[a-zA-Z0-9]{32}', $token))) {
			throw new \InvalidArgumentException("Invalid token format. Expecting a hexadecimalstring with 32 characters.");
		}

		// Save
		Configuration::$token = $token;
	}

	public static function getAccessToken() {
		return Configuration::$token;
	}

}