<?php session_start();
include "config.php";
if(isset($_POST['submit'])){
$email=$_POST['email'];
$password=$_POST['password'];
//vérifier si cette personne est autorisé ou pas
$sql="select * from users where email='$email'";

$user=$cnx->query($sql)->fetch(PDO::FETCH_OBJ);
if(!empty($user)){
    if(password_verify($password,$user->password)){
        
    $_SESSION['email']=$email;
    $_SESSION['password']=$password;
    $_SESSION['id']=$user->id;
    if( $_SESSION['email']=='admin@gmail.com'){
        $_SESSION['type']='admin';

        header("location:list_cars.php");
    }
   else  header("location:list.php");
}else
header("location:index.php?message=Vérifier vos parametres de connexion!");
}else{
    header("location:index.php");
}
}
?>