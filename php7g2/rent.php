<?php
$fin = new DateTime($_POST['fin']);
$debut = new DateTime($_POST['debut']);

$carid=$_POST['carId'];
$userid=$_POST['userid'];

//exit();


//
//PDO
//chane de connexion 

//exec() // insert, update, delete
//query() //select

include "config.php";


//preparer la requete d'insertion d'un nouveau inscrit
#$sql="insert into cars(immat,marque,modele,annee,photo) values ('$immat','$marque','$modele','$annee','$file_name')";
#$cnx->exec($sql);
// Prepare the SQL statement

$dure=$fin->diff($debut);
$days=(int)$dure->days;

$sql1="select tarif_jour from cars where id_voiture=$carid";
$rs=$cnx->query($sql1)->fetch(PDO::FETCH_OBJ);
$tarif=$rs->tarif_jour;
$cout=$tarif*$days;
//print_r($x->days);
$debutString = $debut->format('Y-m-d');
$finString = $fin->format('Y-m-d');
$sql2="UPDATE cars
SET etat ='oui'
WHERE id_voiture=$carid";
$s=$cnx->exec($sql2);
$sql = "INSERT INTO location (date_debut, date_fin, cout_total,id_client,id_voiture) VALUES (:debut, :fin, :cout, :idclient, :idcar)";
$stmt = $cnx->prepare($sql);

// Execute the statement with named parameters
$stmt->execute([
    ':debut' => $debutString,
    ':fin' => $finString,
    ':cout' => $cout,
    ':idclient' => $userid,
    ':idcar' => $carid,

]);
//executer une redirection automatique avec php
header("location:list.php?message=Location effectuée avec succès");
?>