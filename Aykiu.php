<?php

require_once('Personnage.php');

class Aykiu extends Personnage{
    protected $bdd;
    protected $nom;
    protected $pointsDeVie;
    protected $pointsAttaque;
    protected $pointsDefense;
    protected $experience;
    protected $niveau;
    protected $armeEquipee;
    protected $passif = "Sacrifice de la déesse lunairia";
    protected $type = "Archer";
    // protected $embleme = "Lunairia";
    // Ajouter dans le constructeur un embleme
    // et faire pareil pour les autres personnages

    // sacrifier des pv 30% pour one shot un monstre

    public function __construct($nomAykiu, $pvAykiu, $paAykiu, $pdAykiu, $xpAykiu, $lvlAykiu, $armeAykiu){
        $this->nom = $nomAykiu;
        $this->pointsDeVie = $pvAykiu;
        $this->pointsAttaque = $paAykiu;
        $this->pointsDefense = $pdAykiu;
        $this->experience = $xpAykiu;
        $this->niveau = $lvlAykiu;
        $this->armeEquipee = $armeAykiu;
    }

    public function instanceVariables(){
        //Aykiu variables
        $this->nom = "Aykiu";
        $this->pointsDeVie = 110;
        $this->pointsAttaque = 13;
        $this->pointsDefense = 8;
        $this->experience = 0;
        $this->niveau = 1;
        $this->armeEquipee = "Arc en bois";
    }

    public function getNom(){
        return $this->nom;
    }
}

$aykiu = new Aykiu("", 0, 0, 0, 0, 0, "");

$aykiu->instanceVariables();

echo $aykiu->getNom();

?>