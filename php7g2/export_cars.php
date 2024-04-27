<?php
include "security.php";
?>
<?php
include "config.php";
//select liste des voitures
$sql="select * from cars";
$cars=$cnx->query($sql)->fetchAll(PDO::FETCH_OBJ);
//ecrire le resultat dans un fichier csv
$file=fopen("modele.csv","w");
$contenu="";
foreach($cars as $car){
$contenu.= $car->immat.";".$car->marque.";".$car->modele.";".$car->annee.";http://php7g2.test:8989/cars/".$car->photo.";".$car->tarif_jour."\r\n";
}
fputs($file,$contenu);

//telecharger le nouveau fichier csv
header('Content-type: text/csv');
$newname="cars_".date("d-m-Y-His").".csv";
header("Content-Disposition: attachment; filename=".$newname);
readfile("modele.csv");
fclose($file);