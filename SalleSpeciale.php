<?php

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


class SalleSpecialeDAO{
    private $bdd;

    public function __construct($bdd){
        $this->bdd = $bdd;
    }

    public function getSalleSpeciale($id){
        $req = $this->bdd->prepare('SELECT * FROM salles_speciales WHERE id = :id');
        $req->execute(array('id' => $id));
        $donnees = $req->fetch(PDO::FETCH_ASSOC);
        return new SalleSpeciale($donnees['nom'], $donnees['type'], $donnees['description'], $donnees['specialite']);
    }

}


?>