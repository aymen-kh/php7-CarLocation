<?php
include "config.php";
if(isset($_POST['signup'])){
$email=$_POST['email'];
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];

$password=password_hash($_POST['password'],PASSWORD_BCRYPT);
//vérifier si cette personne est autorisé ou pas
$sql="insert into users(nom,prenom,email,password) values('$nom','$prenom','$email','$password')";
$cnx->exec($sql);
header("location:index.php?message=Votre inscription est effectué avec succes!&type=success");
}else{
    header("location:index.php");
}
?>