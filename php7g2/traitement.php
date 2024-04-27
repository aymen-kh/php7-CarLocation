<?php
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$email=$_POST['email'];
$tel=$_POST['tel'];


//
//PDO
//chane de connexion 

//exec() // insert, update, delete
//query() //select

include "config.php";

//upload photo de profil
$accept_type=["image/jpeg","image/jpg","image/png","image/gif","image/webp"];
$file_name=upload($_FILES['photo'],"profils",2048,$accept_type);


//preparer la requete d'insertion d'un nouveau inscrit
$sql="insert into inscrits(nom,prenom,email,tel,photo) values('$nom','$prenom','$email','$tel','$file_name')";
$cnx->exec($sql);
//executer une redirection automatique avec php
header("location:forminscrit.php?message=1");
?>