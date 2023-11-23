<?php

require_once('SalleSpecialeDAO.php');
require_once('Salle.php');

class SalleSpeciale extends Salle {
    public $specialite; // Enigme, piège, marchand, etc.

    // Constructeur
    public function __construct($type, $description, $specialite) {
        parent::__construct($type, $description);
        $this->specialite = $specialite;
    }

    // Méthode pour décrire la salle spéciale
    public function decrireSalleSpeciale() {
        return parent::decrireSalle() . ". Spécialité : {$this->specialite}";
    }
}

?>