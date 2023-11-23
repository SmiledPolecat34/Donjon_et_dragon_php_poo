<?php

class Sidick extends Personnage{
    protected $bdd;
    protected $nom = "Sidick";
    protected $pointsDeVie = 150;
    protected $pointsAttaque;
    protected $pointsDefense = 10;
    protected $experience = 0;
    protected $niveau = 1;
    protected $armeEquipee;
    protected $passif = "Rage";
    protected $type = "Berserker";
    // protected $embleme = "";

    public function __construct($nom, $pointsDeVie, $pointsAttaque, $pointsDefense, $experience, $niveau, $armeEquipee){
        $this->nom = $nom;
        $this->pointsDeVie = $pv;
        $this->pointsAttaque = $pa;
        $this->pointsDefense = $pd;
        $this->experience = $xp;
        $this->niveau = $lvl;
        $this->armeEquipee = $armeEquipee;
    }


}

?>