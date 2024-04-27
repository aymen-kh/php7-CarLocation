<?php
include "Voiture.class.php";

$kia=new Voiture("noir",6);
$skoda=new Voiture("noir",6);
$hundai=new Voiture("noir",6);
echo "la voiture est de couleur ".$kia->getCouleur();
echo "<br>la voiture a la puissance ".$kia->getPuissance()." cv";
echo "<br>la vitesse actuelle est ".$kia->getVitesse();
$kia->demarrer();
echo "<br>la vitesse devient ".$kia->getVitesse();
$kia->accelerer(20);
echo "<br>la vitesse devient ".$kia->getVitesse();
echo "<br>cette voiture a ".Voiture::ROUES." roues";

Voiture::info();

?>