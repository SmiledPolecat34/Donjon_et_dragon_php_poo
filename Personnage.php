<<<<<<< HEAD
<?php

// Personnage.php
require_once('Arme.php');
require_once('Config.php');
require_once('Aykiu.php');
require_once('Franklin.php');
require_once('Sidick.php');

class Personnage {
    private $bdd;
    private $nom;
    private $pointsDeVie;
    private $pointsAttaque;
    private $pointsDefense;
    private $experience;
    private $niveau;
    private $armeEquipee;
    private $passif;
    private $type;
    private $est_vivant = true;

    public function __construct($nom, $pv, $pa, $pd, $xp, $lvl, $armeEquipee, $passif, $type){
        $this->nom = $nom;
        $this->pointsDeVie = $pv;
        $this->pointsAttaque = $pa;
        $this->pointsDefense = $pd;
        $this->experience = $xp;
        $this->niveau = $lvl;
        $this->armeEquipee = $armeEquipee;
        $this->passif = $passif;
        $this->type = $type;
    }
    

    public function getNom(){
        return $this->nom;
    }

    public function getPointsDeVie(){
        if ($this->pointsDeVie <= 0){
            $this->pointsDeVie = 0;

        }
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

    public function getPassif(){
        return $this->passif;
    }

    public function getType(){
        return $this->type;
    }

    public function getEstVivant(){
        return $this->est_vivant;
    }

    public function getArmeEquipee(){
        return $this->armeEquipee;
    }

    public function setNom($nom){
        $this->nom = $nom;
    }

    public function setPointsDeVie($pointsDeVie){
        if ($this->pointsDeVie <= 0){
            $this->pointsDeVie = 0;
            $this->est_vivant = false;
            echo "$nom est mort !";
        }else{
            $this->est_vivant = true;
        }
        $this->pointsDeVie = $pointsDeVie;
    }

    public function setPointsAttaque($armeEquipee){
        $this->pointsAttaque = $armeEquipee->getDegats();
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
    
    public function setPassif($passif){
        $this->passif = $passif;
    }

    public function setType($type){
        $this->type = $type;
    }
    
    public function setEstVivant($est_vivant){
        $this->est_vivant = $est_vivant;
    }

    public function setArmeEquipee($armeEquipee){
        $this->armeEquipee = $armeEquipee;
    }

    public function attaquer($personnage){
        $personnage->setPointsDeVie($personnage->getPointsDeVie() - $this->pointsAttaque);
    }
    
    public function defendre($personnage){
        $personnage->setPointsDeVie($personnage->getPointsDeVie() - $this->pointsDefense);
    }
    
    public function ameliorer($personnage){
        $personnage->setPointsAttaque($personnage->getPointsAttaque() + $this->$experience);
        $personnage->setPointsDefense($personnage->getPointsDefense() + $this->$experience);
    }
    
}

class PersonnageDAO{
    protected $bdd;
    
    public function __construct($bdd){
        $this->bdd = $bdd;
    }

    public function ajouterPersonnage($personnage){
        $req = $this->bdd->prepare('INSERT INTO personnages(nom, pointsDeVie, pointsAttaque, pointsDefense, experience, niveau, armeEquipee, passif, type, est_vivant) VALUES(:nom, :pointsDeVie, :pointsAttaque, :pointsDefense, :experience, :niveau, :armeEquipee, :passif, :type, :est_vivant)');
        $req->execute(array(
            'nom' => $personnage->getNom(),
            'pointsDeVie' => $personnage->getPointsDeVie(),
            'pointsAttaque' => $personnage->getPointsAttaque(),
            'pointsDefense' => $personnage->getPointsDefense(),
            'experience' => $personnage->getExperience(),
            'niveau' => $personnage->getNiveau(),
            'armeEquipee' => $personnage->getArmeEquipee()->getNom(), // Utilisation de getNom() pour obtenir le nom de l'arme
            'passif' => $personnage->getPassif(),
            'type' => $personnage->getType(),
            'est_vivant' => $personnage->getEstVivant()
        ));
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

$bdd = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8', $user, $password);


$personnageDAO = new PersonnageDAO($bdd);

$armeDAO = new ArmeDAO($bdd);
// Création des armes de bases
$arcCommun = new Arme("Arc", "Commun", 1, 25, 10, 0, 0, "");
$batonMagiqueCommun = new Arme("Bâton Magique", "Commun", 1, 17, 6, 0, 0, "");
$epeeCommune = new Arme("Épée", "Commun", 1, 40, 30, 0, 0, "");

$personnage = new Personnage("", 100, 10, 10, 0, 1, $epeeCommune, "", "Joueur");
if($personnage->getNom() == "Aykiu"){
    $personnageDAO->ajouterPersonnage($aykiu);
}else if($personnage->getNom() == "Franklin"){
    $personnageDAO->ajouterPersonnage($franklin);
}else if($personnage->getNom() == "Sidick"){
    $personnageDAO->ajouterPersonnage($sidick);
}


$armeDAO->ajouterArme($arcCommun);
$armeDAO->ajouterArme($batonMagiqueCommun);
$armeDAO->ajouterArme($epeeCommune);

// $personnageDAO->ajouterPersonnage($aykiu);
// $personnageDAO->ajouterPersonnage($franklin);
// $personnageDAO->ajouterPersonnage($sidick);
// Création des personnages

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

=======
<?php

require_once('PersonnageDAO.php');

class Personnage {
    private $bdd;
    private $nom;
    private $pointsDeVie;
    private $pointsAttaque;
    private $pointsDefense;
    private $experience;
    private $niveau;
    private $armeEquipee;
    private $passif;
    private $type;
    private $est_vivant = true;

    public function __construct($nom, $pv, $pa, $pd, $xp, $lvl, $armeEquipee, $passif, $type){
        $this->nom = $nom;
        $this->pointsDeVie = $pv;
        $this->pointsAttaque = $pa;
        $this->pointsDefense = $pd;
        $this->experience = $xp;
        $this->niveau = $lvl;
        $this->armeEquipee = $armeEquipee;
        $this->passif = $passif;
        $this->type = $type;
    }
    

    public function getNom(){
        return $this->nom;
    }

    public function getPointsDeVie(){
        if ($this->pointsDeVie <= 0){
            $this->pointsDeVie = 0;

        }
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

    public function getPassif(){
        return $this->passif;
    }

    public function getType(){
        return $this->type;
    }

    public function getEstVivant(){
        return $this->est_vivant;
    }

    public function setNom($nom){
        $this->nom = $nom;
    }

    public function setPointsDeVie($pointsDeVie){
        if ($this->pointsDeVie <= 0){
            $this->pointsDeVie = 0;
            $this->est_vivant = false;
            echo "$nom est mort !";
        }else{
            $this->est_vivant = true;
        }
        $this->pointsDeVie = $pointsDeVie;
    }

    public function setPointsAttaque($armeEquipee){
        $this->pointsAttaque = $armeEquipee->getDegats();
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
    
    public function setPassif($passif){
        $this->passif = $passif;
    }

    public function setType($type){
        $this->type = $type;
    }
    
    public function setEstVivant($est_vivant){
        $this->est_vivant = $est_vivant;
    }

    public function attaquer($personnage){
        $personnage->setPointsDeVie($personnage->getPointsDeVie() - $this->pointsAttaque);
    }
    
    public function defendre($personnage){
        $personnage->setPointsDeVie($personnage->getPointsDeVie() - $this->pointsDefense);
    }
    
    public function ameliorer($personnage){
        $personnage->setPointsAttaque($personnage->getPointsAttaque() + $this->$experience);
        $personnage->setPointsDefense($personnage->getPointsDefense() + $this->$experience);
    }
    
}

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

>>>>>>> aed68aaeafbeb5beaa07bea76416f47dc0b26542
?>