<?php

require_once('ArmeDAO.php');

class Arme{
    private $nom;
    private $degats;
    private $rareté;

    public function __construct($nom, $degats, $rareté){
        $this->degats = $degats;
        $this->nom = $nom;
        $this->rareté = $rareté;
    }

    public function getNom(){
        return $this->nom;
    }

    public function getDegats(){
        return $this->degats;
    }

    public function setNom($nom){
        $this->nom = $nom;
    }

    public function setDegats($degats){
        $this->degats = $degats;
    }

    public function getRareté(){
        return $this->rareté;
    }

    public function setRareté(){
        $this->rareté = $rareté;
    }

    public function ameliorer($arme){
        $arme->setDegats($arme->getDegats() + 1);
    }

    public function deblocageArme($personnage){
        if($personnage->getNiveau() >= $arme->getNiveauRequis()){
            $personnage->setArmeEquipee($arme);
        }
    }
    

}
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