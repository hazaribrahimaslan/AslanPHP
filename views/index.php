<?php
include "../sources/aslan.php";
class index{
  public function __construct(){
    ob_start();
    session_start();
    $aslan = new aslan();
  }
}
