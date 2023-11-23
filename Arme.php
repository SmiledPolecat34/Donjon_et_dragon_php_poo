<?php

require_once('ArmeDAO.php');

class Arme{
    private $nom;
    private $degats;
    private $rareté;

    public function __construct($nom, $degats, $rareté){
        $this->degats = $degats;
        $this->nom = $nom;
        $this->rareté = $rareté;
    }

    public function getNom(){
        return $this->nom;
    }

    public function getDegats(){
        return $this->degats;
    }

    public function setNom($nom){
        $this->nom = $nom;
    }

    public function setDegats($degats){
        $this->degats = $degats;
    }

    public function getRareté(){
        return $this->rareté;
    }

    public function setRareté(){
        $this->rareté = $rareté;
    }

    public function ameliorer($arme){
        $arme->setDegats($arme->getDegats() + 1);
    }

    public function deblocageArme($personnage){
        if($personnage->getNiveau() >= $arme->getNiveauRequis()){
            $personnage->setArmeEquipee($arme);
        }
    }
    

}

?>