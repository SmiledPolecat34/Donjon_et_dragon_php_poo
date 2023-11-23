<?php

require_once('Systeme.php');
require_once('Personnage.php');
require_once('Monstres.php');
require_once('MonstresDAO.php');
require_once('Arme.php');
require_once('Config.php');
require_once('Salle.php');
require_once('SalleSpeciale.php');

$monstre = new Monstres("Squelette furieux", 100, 10, 5, 0, 1);
echo $monstre->getNom();
$monstre = new Monstres("Ghoul", 100, 10, 5, 0, 1);
echo $monstre->getNom();
// $monstre = new Monstre("Cultiste corrompue", 100, 10, 5, 0, 1);
// $monstre = new Monstre("Démon", 100, 10, 5, 0, 1);
// $monstre = new Monstre("Gargouille enragé", 100, 10, 5, 0, 1);
// $monstre = new Monstre("fantome perdu", 100, 10, 5, 0, 1);

// $boss = new Monstre("Nécromancien", 100, 10, 5, 0, 1);
// $boss = new Monstre("Reine des Sorcière ", 100, 10, 5, 0, 1);
// $boss = new Monstre("Roi des démons", 100, 10, 5, 0, 1);

?>