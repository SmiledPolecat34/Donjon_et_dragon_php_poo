<?php

class InvenraireDAO{
    private $bdd;

    public function __construct($bdd){
        $this->bdd = $bdd;
    }

    public function getInventaire($id){
        $req = $this->bdd->prepare('SELECT * FROM inventaire WHERE id = :id');
        $req->execute(array('id' => $id));
        $donnees = $req->fetch(PDO::FETCH_ASSOC);
        return new Inventaire($donnees['poids_arme'], $donnees['capacite_stockage']);
    }

}

?>