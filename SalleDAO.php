<?php

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

?>