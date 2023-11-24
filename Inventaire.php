<?php

require_once('InventaireDAO.php');

class Inventaire{
    private $poids_arme;
    private $capacite_stockage;

    public function __construct($poids_arme, $capacite_stockage){
        $this->poids_arme = $poids_arme;
        $this->capacite_stockage = $capacite_stockage;
    }

    public function getPoidsArme(){
        return $this->poids_arme;
    }

    public function getCapaciteStockage(){
        return $this->capacite_stockage;
    }

    public function setPoidsArme($poids_arme){
        $this->poids_arme = $poids_arme;
    }

    public function setCapaciteStockage($capacite_stockage){
        $this->capacite_stockage = $capacite_stockage;
    }

    public function ajouterArme($arme){
        $this->poids_arme = $this->poids_arme + $arme->getPoids();
    }

    public function retirerArme($arme){
        $this->poids_arme = $this->poids_arme - $arme->getPoids();
    }

    public function afficherInventaire(){
        echo "Poids de l'arme : $this->poids_arme";
        echo "Capacité de stockage : $this->capacite_stockage";
    }

    public function changerArme($arme){
        $this->poids_arme = $arme->getPoids();
    }
}

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