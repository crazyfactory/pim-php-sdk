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
	private static $secret = null;
	private static $path = "http://localhost/pim-api";

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

	public static function setPath($path) {

		// TODO: Throw up if $path has invalid format or is empty
		//
		//
		//

		// Save
		Configuration::$path = $path;
	}

	public static function getPath() {
		return Configuration::$path;
	}
}