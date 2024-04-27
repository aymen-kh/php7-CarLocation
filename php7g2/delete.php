<?php
include "securityuser.php";
?>
<?php
include "config.php";
$id_inscrit=$_POST['id_inscrit'];
$sql="select * from users where id=$id_inscrit";
$inscrit=$cnx->query($sql)->fetch(PDO::FETCH_OBJ);
//supprimer photo de profil
if(!empty($inscrit->photo))
unlink("profils/".$inscrit->photo);

$sql="delete from users where id=$id_inscrit";
//retourne le nombre de lignes affecté
if($cnx->exec($sql)>0)
header("location:list_inscrit.php?message=la suppression est effectuée avec success!");
