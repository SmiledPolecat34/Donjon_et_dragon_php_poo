<?php

class Personnage{
    private $nom;
    private $pointsDeVie;
    private $pointsAttaque;
    private $pointsDefense;
    private $amelioration;

    public function __construct($nom, $pointsDeVie, $pointsAttaque, $pointsDefense, $amelioration){
        $this->nom = $nom;
        $this->pointsDeVie = $pv;
        $this->pointsAttaque = $pa;
        $this->pointsDefense = $pd;
        $this->amelioration = $upgrade;
    }
    
}
?>