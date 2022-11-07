<?php 
    ini_set('display_erros','1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
    //Naming
    //snake_case
    //campleCase
    //CapitalCase
    interface AnimalInterface {
        public function eat ();
    }

    trait DogMethod {
        public function myDog() {
            echo "My dog color is ".$this->color = 'White<br>';
            echo "My Dog age is ".$this->age='10';
        }

        public function bark() {
            echo "<h3>Woof!</h3>";
        }
    }


    abstract class Animal implements AnimalInterface{
        protected $age;
        public function eat () {
            echo "<h3>This animal is eating!</h3>";
        }
    }

    class Dog extends Animal{
        public $name;
        public $type;
        private $color;

        use DogMethod;
        
        public function __construct($type) {
            echo "<h3>$type</h3>";
        }

        

    }

    // $animal = new Aimal();
    // var_dump($animal)

    $dog = new Dog('Poodle');
    
    $dog->name = 'Aung Net';
    $dog->myDog();
    $dog->bark();
    $dog->eat();
    var_dump($dog);

    class Utils {
        public static $version = '1.0';

        public static function app() {
            echo "<h3>App version is ".self::$version."</h3>";
        }
    }

    Utils::app();
    echo Utils::$version;


    class Math {
        private $PI = 3.14;
        public function __call($name, $args) {
            echo "<h3>Method $name does't exist.</h3>";
        }

        public static function __callStatic($name , $args) {
            echo "<h3>Static Method $name doesn't exists.</h3>";
        }

        public function __invoke() {
            echo "<h3>This is not a function.</h3>";
        }

        public function __set($name , $value) {
            echo "<h3>Connot set $name with $value.</h3>";
        }

        public function __get($name) {
            echo "<h3>Cannot get $name </he>";
        }

        public function __toString() {
            return "PI = $this->PI";
        }
    }

    $obj = new Math();
    $obj->add();
    Math::sub();
    $obj();
    $obj->PI = 3.142;
    $obj->PI;

    echo $obj;

?>