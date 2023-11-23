<?php

class Menu {
    private $bdd;

    public function __construct($bdd){
        $this->bdd = $bdd;
    }

    public function choixPersonnage(){
        $choix = readline("Quel personnage voulez-vous choisir ? 1 : Aykiu, 2 : Franklin, 3 : Sidick");
        switch($choix){
            //Aykiu
            case 1:
                echo " 1 : Voir l'histoire, 2 : Voir les caractéristiques, ou 3 : Choisir ce personnage";
                $choix2 = readline("Que voulez-vous faire ?");
                switch($choix2){
                    case 1:
                        echo "Aykiu est un archer qui a été choisi par la déesse Lunairia pour sauver le monde.";
                        echo "Il a été choisi car il est le meilleur archer du monde.";
                        echo "Elu pour vaincre le roi démon qui a été ressuscité par un nécromancien.";
                        echo "Il doit donc aller dans le donjon pour vaincre ce fameux être maléfique.";
                        break;
                    case 2:
                        $personnage = new Aykiu($nom, $pointsDeVie, $pointsAttaque, $pointsDefense, $experience, $niveau, $armeEquipee, $passif, $type);
                        echo `Nom : $personnage->getNom()`;
                        echo `Points de vie : $personnage->getPointsDeVie()`;
                        echo `Points d'attaque : $personnage->getPointsAttaque()`;
                        echo `Points de défense : $personnage->getPointsDefense()`;
                        echo `Passif : $personnage->getPassif()`;
                        echo `Type : $personnage->getType()`;
                        break;
                    case 3:
                        if ($personnage == true){
                            echo "Vous avez choisi Aykiu !";
                            $this->menuDonjon();
                        }
                        else if($personnage == false){
                        $personnage = new Aykiu($nom, $pointsDeVie, $pointsAttaque, $pointsDefense, $experience, $niveau, $armeEquipee, $passif, $type);
                        echo "Personnage créé avec succès !";
                        $this->choixPersonnage();
                        }
                        else{
                            echo "Erreur";
                        }
                        $this->menuLancement();
                        break;
                    default:
                        echo "Erreur";
                        break;
                }
                break;
            //Franklin
            case 2:
                echo " 1 : Voir l'histoire, 2 : Voir les caractéristiques, ou 3 : Choisir ce personnage";
                $choix2 = readline("Que voulez-vous faire ?");
                switch($choix2){
                    case 1:
                        echo "Franklin est un mage qui a été choisi par la déesse Megicula pour sauver le monde.";
                        echo "Il a été choisi car il est le meilleur mage du monde.";
                        echo "Elu pour vaincre le roi démon qui a été ressuscité par un nécromancien.";
                        echo "Il doit donc aller dans le donjon pour vaincre ce fameux être maléfique.";
                        break;
                    case 2:
                        $personnage = new Franklin($nom, $pointsDeVie, $pointsAttaque, $pointsDefense, $experience, $niveau, $armeEquipee, $passif, $type);
                        echo `Nom : $personnage->getNom()`;
                        echo `Points de vie : $personnage->getPointsDeVie()`;
                        echo `Points d'attaque : $personnage->getPointsAttaque()`;
                        echo `Points de défense : $personnage->getPointsDefense()`;
                        echo `Passif : $personnage->getPassif()`;
                        echo `Type : $personnage->getType()`;
                        break;
                    case 3:
                        if ($personnage == true){
                            echo "Vous avez choisi Franklin !";
                            $this->menuDonjon();
                        }
                        else if($personnage == false){
                        $personnage = new Franklin($nom, $pointsDeVie, $pointsAttaque, $pointsDefense, $experience, $niveau, $armeEquipee, $passif, $type);
                        echo "Personnage créé avec succès !";
                        $this->menuDonjon();
                        }
                        else{
                            echo "Erreur";
                        }
                        default:
                            echo "Erreur";
                            break;
                    }
                break;
            //Sidick
            case 3:
                echo " 1 : Voir l'histoire, 2 : Voir les caractéristiques, ou 3 : Choisir ce personnage";
                $choix2 = readline("Que voulez-vous faire ?");
                switch($choix2){
                    case 1:
                        echo "Sidick est un berserker qui a été choisi par la déesse Lunairia pour sauver le monde.";
                        echo "Il a été choisi car il est le meilleur berserker du monde.";
                        echo "Elu pour vaincre le roi démon qui a été ressuscité par un nécromancien.";
                        echo "Il doit donc aller dans le donjon pour vaincre ce fameux être maléfique.";
                        break;
                    case 2:
                        $personnage = new Sidick($nom, $pointsDeVie, $pointsAttaque, $pointsDefense, $experience, $niveau, $armeEquipee, $passif, $type);
                        echo `Nom : $personnage->getNom()`;
                        echo `Points de vie : $personnage->getPointsDeVie()`;
                        echo `Points d'attaque : $personnage->getPointsAttaque()`;
                        echo `Points de défense : $personnage->getPointsDefense()`;
                        echo `Passif : $personnage->getPassif()`;
                        echo `Type : $personnage->getType()`;
                        break;
                    case 3:
                        if ($personnage == true){
                            echo "Vous avez choisi Sidick !";
                            echo "Personnage créé avec succès !";
                            $this->menuDonjon();
                        }
                        else if($personnage == false){
                        $personnage = new Sidick($nom, $pointsDeVie, $pointsAttaque, $pointsDefense, $experience, $niveau, $armeEquipee, $passif, $type);
                        echo "Personnage créé avec succès !";
                        $this->menuDonjon();
                        }
                        else{
                            echo "Erreur";
                        }
                        default:
                            echo "Erreur";
                            break;
                    }
                break;
            default:
                echo "Erreur";
                break;
        }
    }

    public function menuLancement(){
        echo "1 : Aller dans le donjon";
        echo "2 : Charger une partie";
        echo "3 : Afficher les crédits";
        echo "4 : Quitter le jeu";

        $choix = readline("Que voulez-vous faire ? 1, 2, 3, 4");

        switch($choix){
            case 1:
                $this->choixPersonnage();
                break;
            case 2:
                $this->menuChargerPartie();
                break;
            case 3:
                $this->menuCredits();
                break;
            case 4:
                echo "Vous quittez le jeu.";
                exit();
                break;
            default:
                echo "Erreur";
                break;
        }
    }

    public function menuDonjon(){
        echo "1 : Explorer la salle";
        echo "2 : Ouvrir l'inventaire";
        echo "3 : Sauvegarder la partie";
        echo "4 : Quitter le jeu";

        $choix = readline("Que voulez-vous faire ? 1, 2, 3, 4");

        switch($choix){
            case 1:
                $this->explorerSalle();
                break;
            case 2:
                $this->ouvrirInventaire();
                break;
            case 3:
                $this->sauvegarderPartie();
                break;
            case 4:
                echo "Vous quittez le jeu.";
                exit();
                break;
            default:
                echo "Erreur";
                break;
        }
    }

    public function explorerSalle(){
        $salle = new Salle();
        $salle->explorerDonjon($personnage);
        if($salle->getType() == "monstre"){
            $monstre = new Monstre();
            $monstre->getMonstre($id);
            $this->combat($personnage, $monstre);
        }
        else if($salle->getType() == "tresor"){
            $enigme = new Enigme();
            $enigme->lancerEnigme($personnage);
        }
        else if($salle->getType() == "vide"){
            echo "Il n'y a rien de spécial dans cette salle.";
        }
        else if($salle->getType() == "boss"){
            $monstre = new Monstre();
            $monstre->getMonstre($id);
            $this->combat($personnage, $monstre);
        }
        else if($salle->getType() == "piège"){
            $personnage->setPointsDeVie($personnage->getPointsDeVie() - 20);
            echo "Vous perdez 20 points de vie !";
            echo "Vous êtes tombé dans un piège !";
        }
        else{
            echo "Erreur";
        }
    }

    public function ouvrirInventaire(){
        $inventaire = new Inventaire();
        $inventaire->afficherInventaire();
        $choix = readline("Que voulez-vous faire ? 1 : Changer d'arme, 2 : Quitter l'inventaire");
        switch($choix){
            case 1:
                $arme = new Arme();
                $arme->getArme($id);
                $inventaire->changerArme($arme);
                echo "Vous avez changé d'arme !";
                break;
            case 2:
                echo "Vous quittez l'inventaire.";
                break;
            default:
                echo "Erreur";
                break;
        }
    }
    public function sauvegarderPartie(){
        $personnageDAO = new PersonnageDAO();
        $personnageDAO->sauvegarderPartie($personnage);
        $monstreDAO = new MonstresDAO();
        $monstreDAO->sauvegarderPartie($monstre);
        $salleDAO = new SalleDAO();
        $salleDAO->sauvegarderPartie($salle);
    }
    //La suite à faire
}

?>