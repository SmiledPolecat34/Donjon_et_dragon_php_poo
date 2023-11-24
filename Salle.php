<?php

require_once('SalleDAO.php');

class Salle {
    public $nom; // Nom de la salle
    public $type; // Le type de salle
    public $description; // Description de la salle
    public $monstre; // Le monstre présent dans la salle
    public $boss; // Le boss présent dans la salle

    // Constructeur
    public function __construct($type, $description, $monstre, $boss) {
        $this->type = $type;
        $this->description = $description;
    }

    // Méthode pour décrire la salle
    public function decrireSalle() {
        return "Type de salle : {$this->type}. Description : {$this->description}";
    }

    public function quitterSalle(){
        $this->type = "vide";
        $this->description = "vide";
    }

    public function entrerSalle($salle){
        $this->type = $salle->getType();
        $this->description = $salle->getDescription();
    }

    public function explorerDonjon($personnage){
        $aleatoire = rand(1, 3);
        if($aleatoire == 1){
            $this->type = "vide";
            $this->description = "vide";
            echo "Il n'y a rien de spécial dans cette salle.";
        }
        else if($aleatoire == 2){
            $this->type = "monstre";
            $this->description = "monstre";
            echo "Un monstre se trouve dans cette salle. Vous devez le combattre.";

        }
        else if($aleatoire == 3){
            $this->type = "tresor";
            $this->description = "tresor";
            echo "Un trésor se trouve dans cette salle. Vous pouvez l'ouvrir.";
        }
    }

    public function changerSalle($salle){
        quitterSalle();
        entrerSalle($salle);
    }

    public function getType(){
        return $this->type;
    }

    public function getDescription(){
        return $this->description;
    }

    public function setType($type){
        $this->type = $type;
    }

    public function setDescription($description){
        $this->description = $description;
    }
    
    public function getMonstre(){
        return $this->monstre;
    }

    public function getBoss(){
        return $this->boss;
    }
}

class SalleDAO{
    private $bdd;

    public function __construct($bdd){
        $this->bdd = $bdd;
    }

    public function getSalle($id){
        $req = $this->bdd->prepare('SELECT * FROM salles WHERE id = :id');
        $req->execute(array('id' => $id));
        $donnees = $req->fetch(PDO::FETCH_ASSOC);
        return new Salle($donnees['nom'], $donnees['type'], $donnees['description']);
    }

    public function sauvegarderPartie($salle){
        $req = $this->bdd->prepare('UPDATE salles SET nom = :nom, type = :type, description = :description WHERE id = :id');
        $req->execute(array(
            'nom' => $salle->getNom(),
            'type' => $salle->getType(),
            'description' => $salle->getDescription(),
            'id' => $salle->getId()
        ));
    }
}

// Création des salles avec les monstres associés
$crypte = new Salle("La Crypte", "Une salle sombre avec des tombes et des passages mystérieux.", $necromancien, [$squeletteFurieux, $cultisteCorrompue, $gargouilleEnragee]);
$ruines = new Salle("Les Ruines", "Des vestiges anciens avec des colonnes effondrées et des passages étroits.", $ReineDesSorciere, [$ghoul, $fantomeErrant,$GolemDeLaForet ]);
$enfers = new Salle("Les Enfers", "Une salle chaotique avec des flammes, des démons et des dangers mortels.", $roiDemon, [$demon ,$AngesDechus, $Minautore]);

//Monstres salle 1

$necromancien = new Monstre("Nécromancien", 100, 10, 5, 0, 1,);

$squeletteFurieux = new Monstre("Squelette furieux", 100, 10, 5, 0, 1,);
$cultisteCorrompue = new Monstre("Cultiste corrompue", 100, 10, 5, 0, 1,);
$gargouilleEnragee = new Monstre("Gargouille enragé", 100, 10, 5, 0, 1,);

//Monstres salle 2

$reineDesSorciere = new Monstre("Reine des Sorcière ", 100, 10, 5, 0, 1,);

$fantomeErrant = new Monstre("fantome errant", 100, 10, 5, 0, 1,);
$ghoul = new Monstre("Ghoul", 100, 10, 5, 0, 1,);
$golemDeLaForet = new Monstre("Golem de la foret", 100, 10, 5, 0, 1,);

//Monstres salle 3

$roiDemon = new Monstre("Roi des démons", 100, 10, 5, 0, 1,);

$demon = new Monstre("Démon", 100, 10, 5, 0, 1,);
$angesDechus = new Monstre("Ange déchus", 100, 10, 5, 0, 1,);
$minautore = new Monstre("Minotaure", 100, 10, 5, 0, 1,);

// Exemple d'affichage des informations
echo "Nom de la salle : " . $salle1->getNom() . "\n";
echo "Description : " . $salle1->getDescription() . "\n";
echo "Boss : " . $salle1->getBoss()->getNom() . "\n";
echo "Monstres : " . implode(", ", array_map(function ($monstre) {
    return $monstre->getNom();
}, $salle1->getMonstres())) . "\n";



// Affichage des informations sur les salles
echo "Nom de la salle : " . $crypte->getNom() . "\n";
echo "Description : " . $crypte->getDescription() . "\n\n";

echo "Nom de la salle : " . $ruines->getNom() . "\n";
echo "Description : " . $ruines->getDescription() . "\n\n";

echo "Nom de la salle : " . $enfers->getNom() . "\n";
echo "Description : " . $enfers->getDescription() . "\n";


?>

?>