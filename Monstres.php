<?php

// require_once('MonstresDAO.php');
require_once('Personnage.php');
require_once('Config.php');

class Monstres extends Personnage{
    private $id;
    private $bdd;
    private $nom;
    private $pointsDeVie;
    private $pointsAttaque;
    private $pointsDefense;
    private $experience;
    private $niveau;
    private $armeEquipee;

    public function __construct($nom, $pv, $pa, $pd, $xp, $lvl, $armeEquipee){
        $this->nom = $nom;
        $this->pointsDeVie = $pv;
        $this->pointsAttaque = $pa;
        $this->pointsDefense = $pd;
        $this->experience = $xp;
        $this->niveau = $lvl;
        $this->armeEquipee = $armeEquipee;
    }

    public function getArmeEquipee(){
        return $this->armeEquipee;
    }    

    public function getId(){
        return $this->id;
    }

    public function getNom(){
        return $this->nom;
    }

    public function getPointsDeVie(){
        return $this->pointsDeVie;
    }

    public function getPointsAttaque(){
        return $this->pointsAttaque;
    }

    public function getPointsDefense(){
        return $this->pointsDefense;
    }

    public function getExperience(){
        return $this->experience;
    }

    public function getNiveau(){
        return $this->niveau;
    }

    public function setNom($nom){
        $this->nom = $nom;
    }

    public function setPointsDeVie($pointsDeVie){
        $this->pointsDeVie = $pointsDeVie;
    }

    public function setPointsAttaque($pointsAttaque){
        $this->pointsAttaque = $pointsAttaque;
    }

    public function setPointsDefense($pointsDefense){
        $this->pointsDefense = $pointsDefense;
    }

    public function setExperience($experience){
        $this->experience = $experience;
    }

    public function setNiveau($niveau){
        $this->niveau = $niveau;
    }
    
    public function attaquer($personnage){
        $personnage->setPointsDeVie($personnage->getPointsDeVie() - $this->pointsAttaque);
    }
        
    public function defendre($personnage){
        $personnage->setPointsDeVie($personnage->getPointsDeVie() - $this->pointsDefense);
    }
    
    // public function ameliorer($personnage){
    //     $personnage->setPointsAttaque($personnage->getPointsAttaque() + $this->$experience);
    //     $personnage->setPointsDefense($personnage->getPointsDefense() + $this->$experience);
    // }
    
    public function appelALaide($personnage, $monstre){
        $monstre = new Monstre("Monstre", 100, 10, 5, 0, 1, $epee);
        $monstre->action($personnage);
    }
    public function action($personnage){
        $aleatoire = rand(1, 9);
        if($aleatoire == 1 || $aleatoire == 8 || $aleatoire == 9 || $aleatoire == 5){
            $this->attaquer($personnage);
            echo "Le monstre attaque !";
        }
        else if($aleatoire == 2 || $aleatoire == 6 || $aleatoire == 7 || $aleatoire == 3 ){
            $this->defendre($personnage);
            echo "Le monstre se défend !";
        }
        else if($aleatoire == 4){
            $this->appelALaide($personnage);
            echo "Le monstre appelle un autre monstre à l'aide !";
        }else{
            echo "Le monstre ne fait rien.";
            echo $aleatoire;
        }
    }

    public function niveauMonstre($niveau){
        for($i = 1; $i <= $niveau; $i++){
            $this->setPointsDeVie($this->getPointsDeVie() + 10);
            $this->setPointsAttaque($this->getPointsAttaque() + 5);
            $this->setPointsDefense($this->getPointsDefense() + 5);
        }
    }
}

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

$bdd = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8', $user, $password);


$monstresDAO = new MonstresDAO($bdd);

// Est vivant   1 = vivant, 0 = mort
$valeurParDefaut = "";

$monstre1 = new Monstres("Squelette furieux", 100, 10, 5, 0, 1, $valeurParDefaut);
$monstre2 = new Monstres("Ghoul", 100, 10, 5, 0, 1, $valeurParDefaut);

$monstresDAO->ajouterMonstre($monstre1);
$monstresDAO->ajouterMonstre($monstre2);


// Création des personnages
// $aykiu = new Personnage("Aykiu", 110, 13, 8, 0, 1, $arc);
// $franklin = new Personnage("Franklin", 120, 12 , 5, 0, 1, $batonMagique);
// $sidick = new Personnage("Sidick", 150, 17, 10, 0, 1,$epee);

// Création des armes de bases
// $arcCommun = new Arme("Arc", 1,"Commun");
// $batonMagiqueCommun = new Arme("Bâton Magique", 1,"Commun");
// $epeeCommune = new Arme("Épée", 1,"Commun");


// //épée amelioré
// $épéeRare = new Arme("Épée longue en fer ", 25, "Rare");
// $épéeEpique = new Arme("Lame maudite de muramasa", 40, "Epique");
// $épéeLegendaire = new Arme("L'épée maudite du roi démon ", 40, "Légendaire");
// $épéeMythologique = new Arme("La Tueuse de dieux", 60, "Mythologique");


// // Arc amélioré
// $arcRare = new Arme("Arc long en Acier ", 25, "Rare");
// $arcEpique = new Arme("Arc des abysses  ", 40, "Epique");
// $arcLegendaire = new Arme("Arc maudit du roi démon ", 40, "Légendaire");
// $arcMythologique = new Arme("l'Arc tueur de dieux", 60, "Mythologique");

// //Baton magique améliorer
// $batonMagique = new Arme("baton long en Acier ", 25, "Rare");
// $batonMagiqueEpique = new Arme("baton des abysses  ", 40, "Epique");
// $batonMagiqueLegendaire = new Arme("baton maudit du roi démon ", 40, "Légendaire");
// $batonMagiqueMythologique = new Arme("l'baton tueur de dieux", 60, "Mythologique");


// // Équiper les armes aux personnages
// $aykiu->equiperNouvelleArme($arc);
// $franklin->equiperNouvelleArme($batonMagique);
// $sidick->equiperNouvelleArme($epee);

// //Monstres salle 1

// $monstre = new Monstre("Squelette furieux", 100, 10, 5, 0, 1,);
// $monstre = new Monstre("Cultiste corrompue", 100, 10, 5, 0, 1,);
// $monstre = new Monstre("Gargouille enragé", 100, 10, 5, 0, 1,);

// //Monstres salle 2
// $monstre = new Monstre("fantome perdu", 100, 10, 5, 0, 1,);
// $monstre = new Monstre("Ghoul", 100, 10, 5, 0, 1,);
// $monstre = new Monstre("Créature des profondeurs", 100, 10, 5, 0, 1,);

// Monstres salle 3
// $monstre = new Monstre("Démon", 100, 10, 5, 0, 1,);
// $monstre = new Monstre("Ange déchue", 100, 10, 5, 0, 1,);
// $monstre = new Monstre("", 100, 10, 5, 0, 1,);

// $boss = new Monstre("Nécromancien", 100, 10, 5, 0, 1,);
// $boss = new Monstre("Reine des Sorcière ", 100, 10, 5, 0, 1,);
// $boss = new Monstre("Roi des démons", 100, 10, 5, 0, 1,);
?>