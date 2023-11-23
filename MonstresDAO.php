<?php

class MonstresDAO{
    private $bdd;

    public function __construct($bdd){
        $this->bdd = $bdd;
    }

    public function getMonstre($id){
        $req = $this->bdd->prepare('SELECT * FROM monstres WHERE id = :id');
        $req->execute(array('id' => $id));
        $donnees = $req->fetch(PDO::FETCH_ASSOC);
        return new Monstre($donnees['nom'], $donnees['pointsDeVie'], $donnees['pointsAttaque'], $donnees['pointsDefense'], $donnees['experience'], $donnees['niveau'], $donnees['armeEquipee'], $donnees['passif'], $donnees['type'], $donnees['est_vivant']);
    }

    public function ajouterMonstre($monstre){
        $req = $this->bdd->prepare('INSERT INTO monstres(nom, pointsDeVie, pointsAttaque, pointsDefense, experience, niveau, armeEquipee, passif, type, est_vivant) VALUES(:nom, :pointsDeVie, :pointsAttaque, :pointsDefense, :experience, :niveau, :armeEquipee, :passif, :type, :est_vivant)');
        $req->execute(array(
            'nom' => $monstre->getNom(),
            'pointsDeVie' => $monstre->getPointsDeVie(),
            'pointsAttaque' => $monstre->getPointsAttaque(),
            'pointsDefense' => $monstre->getPointsDefense(),
            'experience' => $monstre->getExperience(),
            'niveau' => $monstre->getNiveau(),
            'armeEquipee' => $monstre->getArmeEquipee(),
            'passif' => $monstre->getPassif(),
            'type' => $monstre->getType(),
            'est_vivant' => $monstre->getEstVivant()
        ));
    }

    public function sauvegarderPartie($monstre){
        $req = $this->bdd->prepare('UPDATE monstres SET nom = :nom, pointsDeVie = :pointsDeVie, pointsAttaque = :pointsAttaque, pointsDefense = :pointsDefense, experience = :experience, niveau = :niveau, armeEquipee = :armeEquipee, passif = :passif, type = :type, est_vivant = :est_vivant WHERE id = :id');
        $req->execute(array(
            'nom' => $monstre->getNom(),
            'pointsDeVie' => $monstre->getPointsDeVie(),
            'pointsAttaque' => $monstre->getPointsAttaque(),
            'pointsDefense' => $monstre->getPointsDefense(),
            'experience' => $monstre->getExperience(),
            'niveau' => $monstre->getNiveau(),
            'armeEquipee' => $monstre->getArmeEquipee(),
            'passif' => $monstre->getPassif(),
            'type' => $monstre->getType(),
            'est_vivant' => $monstre->getEstVivant(),
            'id' => $monstre->getId()
        ));
    }
}

?>