#!/usr/bin/php
<?php
class Singleton {
	private static $instance;

	public static function getInstance() {
		if (null === static::$instance) {
			static::$instance = new static();
		}
		return static::$instance;
	}

	// Protected constructor to prevent creating a new isntance from outside this class.
	protected function __construct() {
	}

	// Private clone method to prevent cloning.
	private function __clone() {
	}

	// Private unserialize method to prevent unserializing.
	private function __wakeup() {
	}
}

class SingletonChild extends Singleton {
}

$obj = Singleton::getInstance();
var_dump($obj === Singleton::getInstance()); // bool(true)

$anotherObj = SingletonChild::getInstance();

var_dump($anotherObj === SingletonChild::getInstance()); // bool(true)

var_dump($anotherObj === Singleton::getInstance()); // error
?>
