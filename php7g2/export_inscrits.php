<?php
include "security.php";
?>
<?php
include "config.php";
//select liste des inscrits
$sql="select * from inscrits";
$inscrits=$cnx->query($sql)->fetchAll(PDO::FETCH_OBJ);
//ecrire le resultat dans un fichier csv
$file=fopen("modele.csv","w");
$contenu="";
foreach($inscrits as $inscrit){
$contenu.= $inscrit->nom.";".$inscrit->prenom.";".$inscrit->email.";".$inscrit->tel.";http://php7g2.test:8989/profils/".$inscrit->photo."\r\n";
}
fputs($file,$contenu);

//telecharger le nouveau fichier csv
header('Content-type: text/csv');
$newname="cars_".date("d-m-Y-His").".csv";
header("Content-Disposition: attachment; filename=".$newname);
readfile("modele.csv");
fclose($file);