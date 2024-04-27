<?php
include "config.php";

//upload photo de profil
$accept_type=["text/csv"];
$file_name=upload($_FILES['csv'],"uploads",200,$accept_type);

//ouvrir le fichier parcouru en lecture
$file=fopen("uploads/".$file_name,"r");
while (($row = fgets($file)) !== false) {
   $tab=explode(";",$row);
$email=$tab[2];
$sql2="select * from inscrits where email='$email'";
$inscrit=$cnx->query($sql2)->fetch(PDO::FETCH_OBJ);
if(empty($inscrit)){
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
//preparer la requete d'insertion d'un nouveau inscrit
$sql="insert into inscrits(nom,prenom,email,tel) values('$tab[0]','$tab[1]','$tab[2]','$tab[3]')";
$cnx->exec($sql);
}
}

}

//executer une redirection automatique avec php
header("location:forminscrit.php?message=1");
?>