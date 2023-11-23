<?php

class Franklin extends Personnage{
    protected $bdd;
    protected $nom = "Franklin";
    protected $pointsDeVie = 120;
    protected $pointsAttaque = 12;
    protected $pointsDefense = 5;
    protected $experience = 0;
    protected $niveau = 1;
    protected $armeEquipee;
    protected $passif = "Altération de la réalité";
    protected $type = "Mage";
    // protected $embleme = "Megicula";

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