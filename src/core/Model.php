<?php
/**
 * Created by PhpStorm.
 * User: Wolf
 * Date: 3/10/2016
 * Time: 14:27
 */

namespace PIM\Core;


class Model
{
	protected $_data = array();
	protected $_schemaName;
	protected $_validated = false;

	public function __construct($_class) {
		$this->_schemaName = $this->getSchemaName();
	}

	public function __get($name) {

		if (!isset($this->_data[$name])) {
			throw new \Exception("Doh Sauhünd!");
		}

		return $this->_data[$name];
	}

	public function __set($name, $value)
	{
		// Target validator
		$fnName = "validate" + ucfirst($name);

		// Crash if method doesn't exist (because this means the property should NOT exist on this model)
		if (!method_exists($this, $fnName)) {
			throw new \Exception("Property '".$name."' does not exist!");
		}

		// Validate value or throw up
		if (call_user_func(array($this,$fnName), $value)) {
			throw new \Exception("Property validation failed for '".$name."' with value '".$value."'!");
		}

		// Accept value!
		if ($this->_data[$name] !== $value) {
			$this->_data[$name] = $value;
			$this->_validated = false;
		}
	}

	public function __isset($name) {
		return isset($this->_data[$name]);
	}

	private function getSchemaName($modelName) {
		return __NAMESPACE__ . "\\schemas\\" . $modelName;
	}
}