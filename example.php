<?php
include "database.php";
include "calendar.php";
class example{
  public function __construct(){
    $database = new database();
    $connect = $database->database_connect("localhost","db_name","admin","password");
  }
}
