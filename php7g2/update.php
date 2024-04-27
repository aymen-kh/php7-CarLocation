<?php
include "config.php";

$id_inscrit=$_POST['id_inscrit'];

$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$email=$_POST['email'];
$old_photo=$_POST['old_photo'];
//print_r($_POST);
//exit();
$accept_type=["image/jpeg","image/jpg","image/png","image/gif","image/webp"];
$file_name=upload($_FILES['photo'],"profils",2048,$accept_type);

//si existe ancienne photo il faut la supprimer


if(!empty($old_photo))
unlink("profils/".$old_photo);


//preparer la requete de modification d'un inscrit
$sql="update users set nom='$nom',prenom='$prenom',email='$email',photo='$file_name' where id='$id_inscrit'";
if($cnx->exec($sql)>=0){
//executer une redirection automatique avec php
header("location:list.php?message=la modification est effectuée avec success!");
}else{
    echo "erreur de modification";
}
?>