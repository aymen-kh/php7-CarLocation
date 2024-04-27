<?php
session_start();
if(empty($_SESSION['email'])||empty($_SESSION['password']) || empty($_SESSION['id']))
{
  header("location:index.php?message=veuillez s'authentifier!");
  exit;
}
?>