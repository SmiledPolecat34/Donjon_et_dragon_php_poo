<?php

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