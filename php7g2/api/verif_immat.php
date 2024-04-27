<?php
$id=0;
if(isset($_POST['id_voture']))
$id=$_POST['id_voture'];

$cond="";
if($id>0){  
$cond=" and id_voiture!='$id'";
}

$immat=$_POST['immat'];
include "../config.php";
$sql="select * from cars where immat='$immat' $cond";
$result=$cnx->query($sql)->fetch(PDO::FETCH_OBJ);
if(!empty($result))
echo true;
else
echo false;
?>