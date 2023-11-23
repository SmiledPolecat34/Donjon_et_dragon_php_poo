<?php

class ArmeDAO{
    private $bdd;

    public function __construct($bdd){
        $this->bdd = $bdd;
    }

    public function getArme($id){
        $req = $this->bdd->prepare('SELECT * FROM armes WHERE id = :id');
        $req->execute(array('id' => $id));
        $donnees = $req->fetch(PDO::FETCH_ASSOC);
        return new Arme($donnees['nom'], $donnes['rarete'], $donnees['degats'], $donnees['niveauRequis'], $donnees['poids'], $donnees['est_maudite']);
    }

}

?>