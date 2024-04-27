<?php
include "config.php";

$id_voiture=$_POST['id_voiture'];

$immat=$_POST['immat'];
$marque=$_POST['marque'];
$modele=$_POST['modele'];
$annee=$_POST['annee'];
$old_photo=$_POST['old_photo'];
$tarif=$_POST['tarif'];

$accept_type=["image/jpeg","image/jpg","image/png","image/gif","image/webp"];
$file_name=upload($_FILES['photo'],"cars",2048,$accept_type);

//si existe ancienne photo il faut la supprimer


if(!empty($old_photo))
unlink("cars/".$old_photo);


//preparer la requete de modification d'un id_car
$sql="update cars set immat='$immat',marque='$marque',modele='$modele',annee='$annee',photo='$file_name',tarif_jour='$tarif' where id_voiture='$id_voiture'";
if($cnx->exec($sql)>=0){
//executer une redirection automatique avec php
header("location:list_cars.php?message=la modification est effectuée avec success!");
}else{
    echo "erreur de modification";
}
?>