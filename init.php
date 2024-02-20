<?php
$connect = mysqli_connect("localhost", "root", "", "yeticave");
mysqli_set_charset($connect, "utf8");

class DbHelper {
  private $db_resource;
  private $last_error = null;

  public function __construct($login, $password, $host, $db_name)
  {
    $this->db_resource = mysqli_connect($host, $login, $password, $db_name);

    if (!$this->db_resource) {
      $this->last_error = mysqli_connect_error();
    }
  }

  public function getDbResource() {
    return $this->db_resource;
  }

  public function executeQuery($sql) {
    $res = mysqli_query($this->db_resource, $sql);
    return $res;
  }

  public function getLastError() {
    return $this->last_error;
  }

  public function getLastId() {
    return mysqli_insert_id($this->db_resource);
  }
}

class Person {
  public $name;
  public $sur_name;

  public function __construct($name, $sur_name)
  {
    $this->name = $name;
    $this->sur_name = $sur_name;
  }

  public function getFullName() {
    echo "My name: $this->name <br> My surname: $this->sur_name";
  }
}

class Car {
  public $brand;
  public $color;
  public static $max_speed = 230;

  public function __construct($brand, $color)
  {
    $this->brand = $brand;
    $this->color = $color;
  }

  public function makeSignal() {
    echo "BEEEppp - the car model is $this->brand and the color is $this->color";
  }

  // public static function getMaxSpeed() {
  //   return $this->max_speed;
  // }
}
