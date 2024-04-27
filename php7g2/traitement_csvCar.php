<?php
include "config.php";

//upload photo de profil
$accept_type=["text/csv"];
$file_name=upload($_FILES['csv'],"uploads",200,$accept_type);

//ouvrir le fichier parcouru en lecture
$file=fopen("uploads/".$file_name,"r");
while (($row = fgets($file)) !== false) {
   $tab=explode(";",$row);
$immat=$tab[0];
$sql2="select * from cars where immat='$immat'";
$car=$cnx->query($sql2)->fetch(PDO::FETCH_OBJ);
if(empty($car)){
    //if (filter_var($immat, FILTER_VALIDATE_EMAIL)) {
//preparer la requete d'insertion d'un nouveau inscrit
$sql="insert into cars(immat,marque,modele,annee,tarif_jour) values('$tab[0]','$tab[1]','$tab[2]','$tab[3]',,'$tab[4]')";
$cnx->exec($sql);
    //}
}

}

//executer une redirection automatique avec php
header("location:formajout.php?message=1");
?>