<?php

require_once('SalleDAO.php');

class Salle {
    public $nom; // Nom de la salle
    public $type; // Le type de salle
    public $description; // Description de la salle

    // Constructeur
    public function __construct($type, $description) {
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
    
}

?>