<?php
/**
 * Created by PhpStorm.
 * User: Wolf
 * Date: 3/10/2016
 * Time: 11:21
 */

namespace PIM\Controllers;

use PIM\Models\User;
use PIM\Validators\User as UserValidator;
use PIM\Core\Controller;
use PIM\Core\Validator;

class UserData {
	public $id;
	public $age;
}

class Users extends Controller
{
	/**
	 * Does some funny stuff!
	 *
	 * @param $id int The UserId.
	 *
	 * @return User Returns the user with the given Id. Return null if not found.
	 */
	public static function getById($id) {
		// Validate Arguments
		Validator::isValid("int?", $id);

		// Return Query
		return Users::curl("GET", "/users/get/".$id);
	}

	public static function update($id, $data) {
		// Validate Arguments
		self::validate("int?", $id);

		// Validate Data
		UserValidator::isValid($data);

		// Return Query
		return self::curl("GET", "/users/put".$id, $data);
	}
}
