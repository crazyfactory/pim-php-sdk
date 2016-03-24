<?php
/**
 * Created by PhpStorm.
 * User: Wolf
 * Date: 3/10/2016
 * Time: 11:21
 */

namespace PIM\Models;

use PIM\Core\Model;
use PIM\Core\UserValidator;
use PIM\Core\Validation;


/**
 * Class User
 *
 * @package PIM\Models
 *
 * @property int $age
 * @property bool $isActive
 */
class User extends Model
{
	public function __construct($data, $skipValidation)
	{
		parent::__construct(__CLASS__);

		{
			name: "bob"
		}

		$this->_data = array(
			"age" => 12
		);
	}

	protected function validateName($value) {
		return Validation::validateString($value);
	}
}