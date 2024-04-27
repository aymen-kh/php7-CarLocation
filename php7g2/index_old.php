<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    /* ligne1
    ligne2
    ligne3 */

    //afficher une chaine en php

    #afficher une chaine en php

    echo "<span style='color:red;font-size:40px'>bonjour tous le monde!</span>";

    echo "<br>";
    //constante
    define("TIMBRE",1);
    echo TIMBRE;

    define('NOTES',[15,13,18]);
    //fonction print_r qui affiche une variable de type tableau
    print_r(NOTES);
    echo "<br>";
//porté globale
    $x=5;

    function test(){
        echo "la variable x contient ".$GLOBALS['x']." et le timbre vaut ".TIMBRE;
    }

    test();

    //porté local
    function mytest(){
        $y=10;
        echo "y=$y";
    }

    mytest();

    //echo $y;

    //porté static
    function increment(){
        static $i=0;
        $i++;
        echo $i;
    }

    increment();
    increment();
    increment();
    echo "<br>";
    $a=10;
    unset($a);
    if(!isset($a))
    echo "undefined!";
    else
    echo "la variable a exite";

    if(empty($a))
    echo "la variable a est vide";
    else
    echo "la variable a contient une valeur";
    
    echo "<br>";
$str="boNjOUR ToUs LE MonDE! Bonjour sam, bonjour ali, bonjour salma";
echo ucfirst(strtolower($str));
echo "<br>";
echo str_replace("bonjour","bonsoir",strtolower($str));
echo "<br>";
$str2="152458668578965";
echo strrev($str2);
    ?>
</body>
</html>