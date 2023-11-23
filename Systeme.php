<?php

require_once('Personnage.php');
require_once('Monstres.php');
require_once('Salle.php');
require_once('Menu.php');
require_once('PersonnageDAO.php');
require_once('MonstresDAO.php');
require_once('SalleDAO.php');
require_once('Enigme.php');


class Systeme {
    private $bdd;
    private $personnage;
    private $monstre;
    private $salle;
    private $menu;
    private $personnageDAO;
    private $monstreDAO;
    private $salleDAO;

    public function getPersonnage(){
        return $this->personnage;
    }

    public function getMonstre(){
        return $this->monstre;
    }

    public function getSalle(){
        return $this->salle;
    }

    public function getMenu(){
        return $this->menu;
    }

    public function getPersonnageDAO(){
        return $this->personnageDAO;
    }

    public function getMonstreDAO(){
        return $this->monstreDAO;
    }

    public function getSalleDAO(){
        return $this->salleDAO;
    }

    public function setPersonnage($personnage){
        $this->personnage = $personnage;
    }

    public function setMonstre($monstre){
        $this->monstre = $monstre;
    }

    public function setSalle($salle){
        $this->salle = $salle;
    }

    public function setMenu($menu){
        $this->menu = $menu;
    }

    public function setPersonnageDAO($personnageDAO){
        $this->personnageDAO = $personnageDAO;
    }

    public function setMonstreDAO($monstreDAO){
        $this->monstreDAO = $monstreDAO;
    }

    public function setSalleDAO($salleDAO){
        $this->salleDAO = $salleDAO;
    }

    public function combat($personnage, $monstre){
        while($personnage->getPointsDeVie() > 0 && $monstre->getPointsDeVie() > 0){
            $choix = readline("Que voulez-vous faire ? 1 : Attaquer, 2 : Défendre");
            switch($choix){
                case 1:
                    $personnage->attaquer($monstre);
                    $monstre->action($personnage);
                    echo "Vous attaquez le monstre !";
                    echo "Le monstre attaque !";
                    break;
                case 2:
                    $personnage->defendre($monstre);
                    $monstre->action($personnage);
                    echo "Vous vous défendez !";
                    echo "Le monstre attaque !";
                    break;
                default:
                    echo "Vous ne faites rien.";
                    $monstre->action($personnage);
                    echo "Le monstre $monstre->action($personnage);";
                    break;
            }
        }
        if($personnage->getPointsDeVie() <= 0){
            echo "Vous êtes mort !";
            exit();
        }
        else if($monstre->getPointsDeVie() <= 0){
            echo "Vous avez vaincu le monstre !";
            $aleatoire = rand(1, 10);
            if($aleatoire == 1 || $aleatoire == 4 || $aleatoire == 7 || $aleatoire == 10 || $aleatoire == 5 || $aleatoire == 8 || $aleatoire == 9){// 7 chances sur 10 d'avoir 1 point d'expérience
                $personnage->setExperience($personnage->getExperience() + 1);
                echo "Vous gagnez 1 point d'expérience !";
            }
            else if($aleatoire == 2 || $aleatoire == 6){// 2 chances sur 10 d'avoir 2 points d'expérience
                $personnage->setExperience($personnage->getExperience() + 2);
                echo "Vous gagnez 2 points d'expérience !";
            }
            else if($aleatoire == 3){
                $personnage->setExperience($personnage->getExperience() + 3); // 10% de chance d'avoir 3 points d'expérience
                echo "Vous gagnez 3 points d'expérience !";
            }
        }else{
            echo "Erreur";
        }
    }

    public function enigmes($personnage, $salle){
        $enigme = new Enigme();
        $enigme->lancerEnigme($personnage);
    }
}

?>