<?php
/**
 * Created by PhpStorm.
 * User: Wolf
 * Date: 3/10/2016
 * Time: 14:50
 */

namespace PIM\Core;

class Validation
{
	protected static $validationFunctions = array(
		"string"
	);

	public static function validateString($obj) {
		return $obj === null || is_string($obj);
	}
}

class UserValidator extends Validator
{
	private static $validationMap = array(
		"id" => false,
		"name" => array("string", 12),
		"age" => "int",
		"child" => array("model", "User")
	);

	public static function validateProperty($property, $value) {
		$requirements = self::$validationMap[$property];

		// Property is locked and should not be edited!
		if ($requirements === false)
			return false;

		$

		$fn = self::$validationFunctions()


		return $fn($value);
	}

	private
}