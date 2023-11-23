<?php

require_once('Personnage.php');

class PersonnageDAO{
    protected $bdd;
    
    public function __construct($bdd){
        $this->bdd = $bdd;
    }
    
    public function getPersonnage($id){
        $req = $this->bdd->prepare('SELECT * FROM personnages WHERE id = :id');
        $req->execute(array('id' => $id));
        $donnees = $req->fetch(PDO::FETCH_ASSOC);
        return new Personnage($donnees['nom'], $donnees['pointsDeVie'], $donnees['pointsAttaque'], $donnees['pointsDefense'], $donnees['experience'], $donnees['niveau'], $donnees['armeEquipee'], $donnees['passif'], $donnees['type'], $donnees['est_vivant']);
    }

    public function sauvegarderPartie($personnage){
        $req = $this->bdd->prepare('UPDATE personnages SET nom = :nom, pointsDeVie = :pointsDeVie, pointsAttaque = :pointsAttaque, pointsDefense = :pointsDefense, experience = :experience, niveau = :niveau, armeEquipee = :armeEquipee, passif = :passif, type = :type, est_vivant = :est_vivant WHERE id = :id');
        $req->execute(array(
            'nom' => $personnage->getNom(),
            'pointsDeVie' => $personnage->getPointsDeVie(),
            'pointsAttaque' => $personnage->getPointsAttaque(),
            'pointsDefense' => $personnage->getPointsDefense(),
            'experience' => $personnage->getExperience(),
            'niveau' => $personnage->getNiveau(),
            'armeEquipee' => $personnage->getArmeEquipee(),
            'passif' => $personnage->getPassif(),
            'type' => $personnage->getType(),
            'est_vivant' => $personnage->getEstVivant(),
            'id' => $personnage->getId()
        ));
    }
}

?>