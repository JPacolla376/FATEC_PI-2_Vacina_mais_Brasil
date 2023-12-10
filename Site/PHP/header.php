<?php
session_start();

if(!isset($_SESSION['status'])){
  header("location: ../HTML/login.php");
  exit;
}

if(!$_SESSION['status']){
  header("location: ../HTML/login.php");
  exit;
}