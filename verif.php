<?php
session_start();

if(!isset($_SESSION['login'])) {
  echo 'NIET!!!';
  include('login.php');
  exit;
}
?> 