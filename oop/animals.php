#!/usr/bin/php
<?php
class Animal {
	/*
	 * public -> variable is available everywhere, other classes and instances.
	 * private -> variable is only available in current class.
	 * protected -> variable is is available in current class and classes that extent current class.
	 */
	protected $name;
	protected $sound;
	protected $food;
	protected $id;

	/*
	 * static -> all objects of this class shares this variable.
	 * 			 static methods can be called without instantiation.
	 * 			 use scope resolution operator (::) to access static variables, static methods, and constants
	 */

	// tracking number of animal objects.
	public static $count = 0;

	function getName() {
		return $this->name;
	}

	/*
	 * The constructor is executed whenever a new object is constructed.
	 */
	function __construct() {
		$this->id = rand(100, 1000000);
		echo $this->id . " has been assigned.\n";
		Animal::$count++;
	}

	/*
	 * The destructor is executed when an object is destroyed.
	 */
	function __destruct() {
		echo $this->name . " is being destroyed.\n";
	}

	/*
	 * Getters and Setters are magic methods used to get and set the values of private and protected variables.
	 */
	function __get($name) {
		echo "DEBUG: __getting " . $name . "\n";
		return $this->$name;
	}

	function __set($name, $value) {
		switch($name) {
		case "name":
			$this->name = $value;
			break;
		case "food":
			$this->food = $value;
		case "sound":
			$this->sound = $value;
			break;
		default:
			echo $name . " not found!";
		}

		echo "DEBUG: Setting " . $name . " to " . $value . "\n";
	}

	function run() {
		echo $this->name . " runs.";
	}
}

/*
 * The extends keyword is used to extend a class.
 */
class Dog extends Animal {
	function run() {
		echo $this->name . " runs with wagging tail.";
	}
}

/*
 * Instantiating a new object of class Animal.
 */
$animal1 = new Animal();
$animal1->name = "Spot";
$animal1->food = "Meat";
$animal1->sound = "Woof!";

echo $animal1->name . " says " . $animal1->sound . "\n";
echo $animal1->name . " is hungry, give it some " . $animal1->food . "\n";

echo "Total animals created: " . Animal::$count . "\n";

/*
 * Instantiating a new object of class Dog.
 */
$animal2 = new Dog();
$animal2->name = "Rover";
$animal2->food = "Bones";
$animal2->sound = "Grrrr!";

echo $animal2->name . " says " . $animal2->sound . "\n";
echo $animal2->name . " is hungry, give it some " . $animal2->food . "\n";

echo "Total animals created: " . Dog::$count . "\n";

?>
