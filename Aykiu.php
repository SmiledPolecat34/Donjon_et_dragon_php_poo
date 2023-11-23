<?php

class Aykiu extends Personnage{
    protected $bdd;
    protected $nom = "Aykiu";
    protected $pointsDeVie = 110;
    protected $pointsAttaque = 13;
    protected $pointsDefense = 8;
    protected $experience = 0;
    protected $niveau = 1;
    protected $armeEquipee;
    protected $passif = "Sacrifice de la déesse lunairia";
    protected $type = "Archer";
    // protected $embleme = "Lunairia";
    // Ajouter dans le constructeur un embleme
    // et faire pareil pour les autres personnages

    // sacrifier des pv 30% pour one shot un monstre

    public function __construct($nom, $pointsDeVie, $pointsAttaque, $pointsDefense, $experience, $niveau, $armeEquipee){
        $this->nom = $nom;
        $this->pointsDeVie = $pv;
        $this->pointsAttaque = $pa;
        $this->pointsDefense = $pd;
        $this->experience = $xp;
        $this->niveau = $lvl;
        $this->armeEquipee = "Arc";
    }

    public function getArmeEquipee(){
        return $this->armeEquipee;
    }

    public function setArmeEquipee($armeEquipee){
        $this->armeEquipee = $armeEquipee;
    }
    
}

?>