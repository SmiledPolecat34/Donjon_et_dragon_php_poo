<?php

class EnigmeDAO{
    private $bdd;

    public function __construct($bdd){
        $this->bdd = $bdd;
    }

    public function getEnigme($id){
        $req = $this->bdd->prepare('SELECT * FROM enigmes WHERE id = :id');
        $req->execute(array('id' => $id));
        $donnees = $req->fetch(PDO::FETCH_ASSOC);
        return new Enigme($donnees['question'], $donnees['reponse_correcte'], $donnees['reponse_fausse_1'], $donnees['reponse_fausse_2'], $donnees['reponse_fausse_3'], $donnees['recompense']);
    }


}

?>