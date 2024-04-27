<?php
include "security.php";
?>
<?php
include "config.php";
$id_voiture=$_POST['id_voiture'];
$sql="select * from cars where id_voiture=$id_voiture";
$car=$cnx->query($sql)->fetch(PDO::FETCH_OBJ);
//supprimer photo de profil
if(!empty($car->photo))
unlink("cars/".$car->photo);

$sql="delete from cars where id_voiture=$id_voiture";
//retourne le nombre de lignes affecté
if($cnx->exec($sql)>0)
header("location:list_cars.php?message=la suppression est effectuée avec success!");
