<?php

// Menu.php
require_once('Config.php');
require_once('Personnage.php');
require_once('Monstres.php');
require_once('Aykiu.php');
require_once('Franklin.php');
require_once('Sidick.php');
require_once("AnimationBienvenue.php");


class Menu {
        private $bdd;

        function __construct($bdd){
            $this->bdd = $bdd;
        }

        function menuCredits(){
            $this->echoProgressif("Crédits : ");
            $this->echoProgressif("Jeu créé par : ");
            $this->echoProgressif(" - Aykiu");
            $this->echoProgressif(" - Franklin");
            $this->echoProgressif(" - Sidick", 200000); 
        }
        public function afficherProgressivement($texte, $delai = 5000) {
            for ($i = 0; $i < strlen($texte); $i++) {
                echo $texte[$i];
                usleep($delai);
            }
        }
    
        public function echoProgressif($texte, $delai = 5000) {
            $this->afficherProgressivement($texte, $delai);
            echo PHP_EOL; 
        }
    
        function choixPersonnage(){
        $choix = readline("\n [1] Aykiu \n [2] Franklin \n [3] sidick\n Quel personnage voulez-vous choisir ? >");
        $this->echoProgressif($choix);
        switch($choix){
            //Aykiu
            case 1:
                $this->echoProgressif(" \n [1] Voir l'histoire \n [2] Voir les caractéristiques \n [3] Choisir ce personnage \n");
                $choix2 = readline("Que voulez-vous faire ? >");
                $this->echoProgressif($choix);
                switch($choix2){
                    case 1:
                        $this->echoProgressif("Aykiu est un archer qui a été choisi par la déesse Lunairia pour sauver le monde.");
                        $this->echoProgressif("Il a été choisi car il est le meilleur archer du monde.");
                        $this->echoProgressif("Elu pour vaincre le roi démon qui a été ressuscité par un nécromancien.");
                        $this->echoProgressif("Il doit donc aller dans le donjon pour vaincre ce fameux être maléfique.");
                        break;
                    case 2:
                        $aykiu = new Aykiu("", 0, 0, 0, 0, 0, "", "", "", false);
                        $aykiu->instanceVariables();
                        $this->echoProgressif("Nom : $personnage->getNom()");
                        $this->echoProgressif("Points de vie : $personnage->getPointsDeVie()");
                        $this->echoProgressif("Points d'attaque : $personnage->getPointsAttaque()");
                        $this->echoProgressif("Points de défense : $personnage->getPointsDefense()");
                        $this->echoProgressif("Passif : $personnage->getPassif()");
                        $this->echoProgressif("Type : $personnage->getType()");
                        $this->menuDonjon();
                        break;
                    case 3:
                        $aykiu = new Aykiu("", 0, 0, 0, 0, 0, "", "", "", false);
                        $aykiu->instanceVariables();
                        $this->echoProgressif("Personnage créé avec succès !");
                        $this->menuDonjon();
                        // $this->menuLancement();
                        break;
                    default:
                        $this->echoProgressif("Erreur");
                        break;
                }
                break;
            //Franklin
            case 2:
                $this->echoProgressif(" \n [1] Voir l'histoire \n [2] Voir les caractéristiques \n [3] Choisir ce personnage \n\n");
                $choix2 = readline("Que voulez-vous faire ? >");
                $this->echoProgressif($choix2);
                switch($choix2){
                    case 1:
                        $this->echoProgressif("Franklin est un mage qui a été choisi par la déesse Megicula pour sauver le monde.");
                        $this->echoProgressif("Il a été choisi car il est le meilleur mage du monde.");
                        $this->echoProgressif("Elu pour vaincre le roi démon qui a été ressuscité par un nécromancien.");
                        $this->echoProgressif("Il doit donc aller dans le donjon pour vaincre ce fameux être maléfique.");
                        break;
                    case 2:
                        $personnage = new Franklin("", 0, 0, 0, 0, 0, "", "", "", false);
                        $personnage->instanceVariables();
                        $this->echoProgressif("Nom : $personnage->getNom()");
                        $this->echoProgressif("Points de vie : $personnage->getPointsDeVie()");
                        $this->echoProgressif("Points d'attaque : $personnage->getPointsAttaque()");
                        $this->echoProgressif("Points de défense : $personnage->getPointsDefense()");
                        $this->echoProgressif("Passif : $personnage->getPassif()");
                        $this->echoProgressif("Type : $personnage->getType()");
                        break;
                    case 3:
                        if ($personnage == true){
                            $this->echoProgressif("Vous avez choisi Franklin !");
                            $this->menuDonjon();
                        }
                        else if($personnage == false){
                            $personnage = new Franklin("", 0, 0, 0, 0, 0, "", "", "", false);
                            $personnage->instanceVariables();
                            $this->echoProgressif("Personnage créé avec succès !");
                            $this->menuDonjon();
                        }
                        else{
                            $this->echoProgressif("Erreur");
                        }
                        break;
                    default:
                        $this->echoProgressif("Erreur");
                        break;
                }
                break;
            //Sidick
            case 3:
                $this->echoProgressif(" \n [1] Voir l'histoire \n [2] Voir les caractéristiques \n [3] Choisir ce personnage \n");
                $choix2 = readline("Que voulez-vous faire ? >");
                $this->echoProgressif($choix2);
                switch($choix2){
                    case 1:
                        $this->echoProgressif("$$$$$$$$$$$$$$$$              SIDICK, LE DEMI-DIEU              $$$$$$$$$$$");
                        $this->echoProgressif("Sidick, le demi-dieu, surpassait toute notion de puissance connue.");
                        $this->echoProgressif("Sa force éclipsait tous les domaines du savoir, faisant de lui le maître incontesté de chaque art et chaque compétence.");
                        $this->echoProgressif("Les dieux, constatant sa suprématie, le choisirent pour une mission cruciale.");
                        $this->echoProgressif("Le roi démon, ressuscité par un nécromancien, menaçait de plonger le monde dans les ténèbres éternelles.");
                        $this->echoProgressif("Ainsi, Sidick, élu pour sa perfection dans tous les domaines, se lança sans hésitation dans le donjon maudit,");
                        $this->echoProgressif("déterminé à éradiquer le mal qui risquait de dévorer toute existence.");
                        break;
                    case 2:
                        $personnage = new Sidick("", 0, 0, 0, 0, 0, "", "", "", false);
                        $personnage->instanceVariables();
                        $this->echoProgressif(" Nom : $personnage->getNom()");
                        $this->echoProgressif("Points de vie : $personnage->getPointsDeVie()");
                        $this->echoProgressif("Points d'attaque : $personnage->getPointsAttaque()");
                        $this->echoProgressif("Points de défense : $personnage->getPointsDefense()");
                        $this->echoProgressif("Passif : $personnage->getPassif()");
                        $this->echoProgressif("Type : $personnage->getType()");
                        break;
                    case 3:
                        if ($personnage == true){
                            $this->echoProgressif("Vous avez choisi Sidick !");
                            $this->echoProgressif("Personnage créé avec succès !");
                            $this->menuDonjon();
                        }
                        else if($personnage == false){
                            $personnage = new Sidick("", 0, 0, 0, 0, 0, "", "", "", false);
                            $personnage->instanceVariables();
                            $this->echoProgressif("Personnage créé avec succès !");
                            $this->menuDonjon();
                        }
                        else{
                            $this->echoProgressif("Erreur");
                        }
                        break;
                    default:
                        $this->echoProgressif("Erreur");
                        break;
                }
                break;
            default:
                $this->echoProgressif("Erreur");
                break;
        }
    }
    function menuLancement(){
        $this->echoProgressif(" [1] Aller dans le donjon ");
        $this->echoProgressif(" [2] Charger une partie ");
        $this->echoProgressif(" [3] Afficher les crédits");
        $this->echoProgressif(" [4] Quitter le jeu\n");

        $choix = readline("Que voulez-vous faire (1, 2, 3 ou 4) ? >");
        $this->echoProgressif($choix);
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
                $this->echoProgressif("Vous quittez le jeu.");
                exit();
                break;
            default:
                $this->echoProgressif("Erreur");
                break;
        }
    }

    function menuDonjon(){
        $this->echoProgressif(" \n[1] Explorer la salle");
        $this->echoProgressif(" [2] Ouvrir l'inventaire");
        $this->echoProgressif(" [3] Sauvegarder la partie");
        $this->echoProgressif(" [4] Quitter le jeu\n");

        $choix = readline("Que voulez-vous faire (1, 2, 3 ou 4) ? >");
        $this->echoProgressif($choix);
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
                $this->echoProgressif("Vous quittez le jeu.");
                exit();
                break;
            default:
                $this->echoProgressif("Erreur");
                break;
        }
    }


    function explorerSalle(){
        $salleDAO = new SalleDAO($this->bdd);
        $salles = $salleDAO->getSalles();

        // Choisir une salle aléatoire
        $salleIndex = array_rand($salles);
        $salle = $salles[$salleIndex];

        // Explorer la salle choisie
        echo "Vous explorez la salle : " . $salle->getNom() . "\n";
        echo "Description : " . $salle->getDescription() . "\n";
    
    }

    function ouvrirInventaire(){
        $inventaire = new Inventaire();
        $inventaire->afficherInventaire();
        $choix = readline(" \n [1] Changer d'arme \n [2] Quitter l'inventaire \n\nQue voulez-vous faire ? >");
        $this->echoProgressif($choix);
        switch($choix){
            case 1:
                $arme = new Arme();
                $inventaire->changerArme($arme);
                $this->echoProgressif("Vous avez changé d'arme !");
                break;
            case 2:
                $this->echoProgressif("Vous quittez l'inventaire.");
                break;
            default:
                $this->echoProgressif("Erreur");
                break;
        }
    }

    function sauvegarderPartie(){
        $personnageDAO = new PersonnageDAO();
        $personnageDAO->sauvegarderPartie($personnage);
        $monstreDAO = new MonstresDAO();
        $monstreDAO->sauvegarderPartie($monstre);
        $salleDAO = new SalleDAO();
        $salleDAO->sauvegarderPartie($salle);
    }


}

class Combat {

    public function debuterCombat() {
        echo "Un combat débute entre " . $this->personnage->getNom() . " et " . $this->monstre->getNom() . " !\n";

        while ($this->personnage->getEstVivant() && $this->monstre->getEstVivant()) {
            $this->tourDeCombat();
        }

        $this->afficherResultatCombat();
    }

    protected function tourDeCombat() {
        echo "Tour de combat :\n";
        echo $this->personnage->getNom() . " (Vie: " . $this->personnage->getPointsDeVie() . ") vs " . $this->monstre->getNom() . " (Vie: " . $this->monstre->getPointsDeVie() . ")\n";

        // Le personnage attaque le monstre
        $this->personnage->attaquer($this->monstre);
        echo $this->personnage->getNom() . " attaque " . $this->monstre->getNom() . " !\n";

        // Vérifier si le monstre est toujours vivant après l'attaque
        if (!$this->monstre->getEstVivant()) {
            echo $this->monstre->getNom() . " a été vaincu !\n";
            return;
        }

        // Le monstre attaque le personnage
        $this->monstre->attaquer($this->personnage);
        echo $this->monstre->getNom() . " attaque " . $this->personnage->getNom() . " !\n";

        // Vérifier si le personnage est toujours vivant après l'attaque
        if (!$this->personnage->getEstVivant()) {
            echo $this->personnage->getNom() . " a été vaincu !\n";
        }
    }

    protected function afficherResultatCombat() {
        if (!$this->personnage->getEstVivant()) {
            echo "Vous avez perdu le combat. Game Over.\n";
        } elseif (!$this->monstre->getEstVivant()) {
            echo "Félicitations ! Vous avez vaincu " . $this->monstre->getNom() . ".\n";
            
        }
    }
}

// Exemple d'utilisation
$armeDAO = new ArmeDAO($bdd);

$personnageDAO = new PersonnageDAO($bdd);
$personnage = $personnageDAO->getPersonnage(1); 
$personnage->setArmeEquipee($epeeCommune);

$monstreDAO = new MonstresDAO($bdd);
$monstre = $monstreDAO->getMonstres(1); 

$combat = new Combat($personnage, $monstre);
$combat->debuterCombat();


// Instanciation de la classe Menu
$menu = new Menu($bdd);
$menu->menuLancement();
?>