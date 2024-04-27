<?php
class Voiture{
    //declarer les attributs
    private $couleur;
    private $puissance;
    private $vitesse;
    private static $nbVoitures=0;
    const ROUES=4;

    //declarer la methode constructeur
    public function __construct($c=null,$p=null)
    {
        $this->couleur=$c;
        $this->puissance=$p;
        $this->vitesse=0;
        self::$nbVoitures++;
    }

    //declaration des methodes
    public function demarrer(){
        $this->vitesse=10;
    }

    public function accelerer($v){
        $this->vitesse+=$v;
    }

    public static function info(){
        echo "<br>le nombre de voitures est ".Voiture::$nbVoitures;
    }

    public function getCouleur(){
        return $this->couleur;
    }

    public function getPuissance(){
        return $this->puissance;
    }

    public function getVitesse(){
        return $this->vitesse;
    }
}
