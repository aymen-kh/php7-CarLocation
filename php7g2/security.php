<?php
session_start();
if(empty($_SESSION['email']) || $_SESSION['type']!='admin' ||empty($_SESSION['password']) || empty($_SESSION['id']))
{
  header("location:index.php?message=veuillez s'authentifier!");
  exit;
}
?>