<?php
$connect = mysqli_connect("localhost", "root", "", "yeticave");
mysqli_set_charset($connect, "utf8");

// class DbHelper {
//   private $db_resource;
//   private $last_error = null;

//   public function __construct($login, $password, $host, $db_name)
//   {
//     $this->db_resource = mysqli_connect($host, $login, $password, $db_name);

//     if (!$this->db_resource) {
//       $this->last_error = mysqli_connect_error();
//     }
//   }

//   public function getDbResource() {
//     return $this->db_resource;
//   }

//   public function executeQuery($sql) {
//     $res = mysqli_query($this->db_resource, $sql);
//     return $res;
//   }

//   public function getLastError() {
//     return $this->last_error;
//   }

//   public function getLastId() {
//     return mysqli_insert_id($this->db_resource);
//   }
// }

class Person {
  public $name;
  public $sur_name;

  public function __construct($name, $sur_name)
  {
    $this->name = $name;
    $this->sur_name = $sur_name;
  }

  public function getFullName() {
    return print("My name: $this->name <br> My surname: $this->sur_name");
  }
}

$man = new Person('Anton', 'Zhilin');

print(gettype($man));

print('<br>');

print($man->getFullName());