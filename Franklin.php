<?php

require_once('Personnage.php');


class Franklin extends Personnage{
    protected $bdd;
    protected $nom;
    protected $pointsDeVie;
    protected $pointsAttaque;
    protected $pointsDefense;
    protected $experience;
    protected $niveau;
    protected $armeEquipee;
    protected $passif = "Altération de la réalité";
    protected $type = "Mage";
    // protected $embleme = "Megicula";

    public function __construct($nomFranklin, $pvFranklin, $paFranklin, $pdFranklin, $xpFranklin, $lvlFranklin, $armeFranklin){
        $this->nom = $nomFranklin;
        $this->pointsDeVie = $pvFranklin;
        $this->pointsAttaque = $paFranklin;
        $this->pointsDefense = $pdFranklin;
        $this->experience = $xpFranklin;
        $this->niveau = $lvlFranklin;
        $this->armeEquipee = $armeFranklin;
    }

    public function instanceVariables(){
        //Franklin variables
        $this->nom = "Franklin";
        $this->pointsDeVie = 100;
        $this->pointsAttaque = 10;
        $this->pointsDefense = 10;
        $this->experience = 0;
        $this->niveau = 1;
        $this->armeEquipee = "Bâton en bois";
    }

    public function getNom(){
        return $this->nom;
    }
}

$franklin = new Franklin("", 0, 0, 0, 0, 0, "");

$franklin->instanceVariables();

echo $franklin->getNom();

?>