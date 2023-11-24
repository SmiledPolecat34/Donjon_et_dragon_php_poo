<?php

class Objet {
    private $nom;
    private $effet;
    private $rarete;

    // Constructeur
    public function __construct($nom, $effet, $rarete) {
        $this->nom = $nom;
        $this->effet = $effet;
        $this->rarete = $rarete;
    }

    // Getters
    public function getNom() {
        return $this->nom;
    }

    public function getEffet() {
        return $this->effet;
    }

    public function getRarete() {
        return $this->rarete;
    }
}

// Exemple d'utilisation
$potion = new Objet("Potion de soin", "Restaure 20 points de vie", "Commun");
$elixir = new Objet("Élixir de puissance", "Augmente les dégâts de 20%", "Rare");
$cape= new Objet("Cape d'invisibilité", "Permet de se rendre invisible pendant 2 tour ", "Épique");
$pierrerésurrection = new Objet("Pierre de résurrection", "Permet de ressusciter une fois en cas de mort", "Légendaire");
$larmeDesDieux = new Objet("Larme des dieux", "Accorde des pouvoirs surhumains, donne les effets de la potion, de l'elixir de puissance, et de la cape d'invinsibilité", "Mythologique");

// Affichage des informations sur les objets
echo "Potion de soin : " . $potionCommune->getNom() . ", Effet : " . $potionCommune->getEffet() . ", Rareté : " . $potionCommune->getRarete() . "\n";
echo "Élixir de puissance : " . $elixirRare->getNom() . ", Effet : " . $elixirRare->getEffet() . ", Rareté : " . $elixirRare->getRarete() . "\n";
echo "Cape d'invisibilité : " . $capeEpique->getNom() . ", Effet : " . $capeEpique->getEffet() . ", Rareté : " . $capeEpique->getRarete() . "\n";
echo "Pierre de Résurrection : " . $pierreLegendaire->getNom() . ", Effet : " . $pierreLegendaire->getEffet() . ", Rareté : " . $pierreLegendaire->getRarete() . "\n";
echo "Larme des dieux : " . $larmeMythologique->getNom() . ", Effet : " . $larmeMythologique->getEffet() . ", Rareté : " . $larmeMythologique->getRarete() . "\n";

$inventaire = new Inventaire();

$inventaire->ajouterObjet($potion);
$inventaire->ajouterObjet($elixir);
$inventaire->ajouterObjet($cape);
$inventaire->ajouterObjet($pierrerésurrection);
$inventaire->ajouterObjet($larmeDesDieux);

$inventaire->afficherInventaire();
$inventaire->afficherInventaire();
?>