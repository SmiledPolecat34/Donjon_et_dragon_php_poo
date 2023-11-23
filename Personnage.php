<?php

require_once('PersonnageDAO.php');

class Personnage {
    private $bdd;
    private $nom;
    private $pointsDeVie;
    private $pointsAttaque;
    private $pointsDefense;
    private $experience;
    private $niveau;
    private $armeEquipee;
    private $passif;
    private $type;
    private $est_vivant = true;

    public function __construct($nom, $pv, $pa, $pd, $xp, $lvl, $armeEquipee, $passif, $type){
        $this->nom = $nom;
        $this->pointsDeVie = $pv;
        $this->pointsAttaque = $pa;
        $this->pointsDefense = $pd;
        $this->experience = $xp;
        $this->niveau = $lvl;
        $this->armeEquipee = $armeEquipee;
        $this->passif = $passif;
        $this->type = $type;
    }
    

    public function getNom(){
        return $this->nom;
    }

    public function getPointsDeVie(){
        if ($this->pointsDeVie <= 0){
            $this->pointsDeVie = 0;

        }
        return $this->pointsDeVie;
    }

    public function getPointsAttaque(){
        return $this->pointsAttaque;
    }

    public function getPointsDefense(){
        return $this->pointsDefense;
    }

    public function getExperience(){
        return $this->experience;
    }

    public function getNiveau(){
        return $this->niveau;
    }

    public function getPassif(){
        return $this->passif;
    }

    public function getType(){
        return $this->type;
    }

    public function getEstVivant(){
        return $this->est_vivant;
    }

    public function setNom($nom){
        $this->nom = $nom;
    }

    public function setPointsDeVie($pointsDeVie){
        if ($this->pointsDeVie <= 0){
            $this->pointsDeVie = 0;
            $this->est_vivant = false;
            echo "$nom est mort !";
        }else{
            $this->est_vivant = true;
        }
        $this->pointsDeVie = $pointsDeVie;
    }

    public function setPointsAttaque($armeEquipee){
        $this->pointsAttaque = $armeEquipee->getDegats();
    }

    public function setPointsDefense($pointsDefense){
        $this->pointsDefense = $pointsDefense;
    }

    public function setExperience($experience){
        $this->experience = $experience;
    }

    public function setNiveau($niveau){
        $this->niveau = $niveau;
    }
    
    public function setPassif($passif){
        $this->passif = $passif;
    }

    public function setType($type){
        $this->type = $type;
    }
    
    public function setEstVivant($est_vivant){
        $this->est_vivant = $est_vivant;
    }

    public function attaquer($personnage){
        $personnage->setPointsDeVie($personnage->getPointsDeVie() - $this->pointsAttaque);
    }
    
    public function defendre($personnage){
        $personnage->setPointsDeVie($personnage->getPointsDeVie() - $this->pointsDefense);
    }
    
    public function ameliorer($personnage){
        $personnage->setPointsAttaque($personnage->getPointsAttaque() + $this->$experience);
        $personnage->setPointsDefense($personnage->getPointsDefense() + $this->$experience);
    }
    
}

?>