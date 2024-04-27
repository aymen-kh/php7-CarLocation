<?php
$immat=$_POST['immat'];
$modele=$_POST['modele'];
$marque=$_POST['marque'];
$annee=$_POST['annee'];
$tarif=$_POST['tarif'];


//
//PDO
//chane de connexion 

//exec() // insert, update, delete
//query() //select

include "config.php";

//upload photo de profil
$accept_type=["image/jpeg","image/jpg","image/png","image/gif","image/webp"];
$file_name=upload($_FILES['photo'],"cars",2048,$accept_type);

//preparer la requete d'insertion d'un nouveau inscrit
#$sql="insert into cars(immat,marque,modele,annee,photo) values ('$immat','$marque','$modele','$annee','$file_name')";
#$cnx->exec($sql);
// Prepare the SQL statement
$sql = "INSERT INTO cars (immat, marque, modele, annee, photo,tarif_jour) VALUES (:immat, :marque, :modele, :annee, :photo, :tarif)";
$stmt = $cnx->prepare($sql);

// Execute the statement with named parameters
$stmt->execute([
    ':immat' => $immat,
    ':marque' => $marque,
    ':modele' => $modele,
    ':annee' => $annee,
    ':photo' => $file_name,
    ':tarif' => $tarif

]);
//executer une redirection automatique avec php
header("location:formajout.php?message=1");
?>