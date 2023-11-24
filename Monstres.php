<?php

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
    private $type;
    private $passif;
    private $est_vivant;
    private $id_salle;
    private $armeEquipee;

    public function __construct($nom, $pv, $pa, $pd, $xp, $lvl, $armeEquipee, $passif, $type, $est_vivant, $id_salle){
        $this->nom = $nom;
        $this->pointsDeVie = $pv;
        $this->pointsAttaque = $pa;
        $this->pointsDefense = $pd;
        $this->experience = $xp;
        $this->niveau = $lvl;
        $this->passif = $passif;
        $this->type = $type;
        $this->armeEquipee = $armeEquipee;
        $this->est_vivant = $est_vivant;
        $this->id_salle = $id_salle;

        if (isset($donnees['nom'])) {
            $this->nom = $donnees['nom'];
        }
    }

    public function getArmeEquipee(){
        return $this->armeEquipee;
    }    

    public function getIdSalle(){
        return $this->id_salle;
    }

    public function getId(){
        return $this->id;
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

    public function setArmeEquipee($armeEquipee){
        $this->armeEquipee = $armeEquipee;
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

    }
    
    // public function ameliorer($personnage){
    //     $personnage->setPointsAttaque($personnage->getPointsAttaque() + $this->$experience);
    //     $personnage->setPointsDefense($personnage->getPointsDefense() + $this->$experience);
    // }
    
    function appelALaide($personnage, $monstres){
        $monstres = new Monstres("Monstres", 100, 10, 5, 0, 1, $epee);
        $monstres->action($personnage);
    }
    function action($personnage){
        $aleatoire = rand(1, 9);
        if($aleatoire == 1 || $aleatoire == 8 || $aleatoire == 9 || $aleatoire == 5){
            $this->attaquer($personnage);
            echo "Le monstres attaque !";
        }
        else if($aleatoire == 2 || $aleatoire == 6 || $aleatoire == 7 || $aleatoire == 3 ){
            $this->defendre($personnage);
            echo "Le monstres se défend !";
        }
        else if($aleatoire == 4){
            $this->appelALaide($personnage);
            echo "Le monstres appelle un autre monstres à l'aide !";
        }else{
            echo "Le monstres ne fait rien.";
            echo $aleatoire;
        }
    }

    function niveauMonstres($niveau){
        for($i = 1; $i <= $niveau; $i++){
            $this->setPointsDeVie($this->getPointsDeVie() + 10);
            $this->setPointsAttaque($this->getPointsAttaque() + 5);
            $this->setPointsDefense($this->getPointsDefense() + 5);
        }

        function niveauMonstres($niveau){
            for($i = 1; $i <= $niveau; $i++){
                $this->setPointsDeVie($this->getPointsDeVie() + 10);
                $this->setPointsAttaque($this->getPointsAttaque() + 5);
                $this->setPointsDefense($this->getPointsDefense() + 5);
            }
        }
    
        function getIdSalle(){
            return $this->id_salle;
        }
    }

class MonstresDAO{
    private $bdd;

    public function __construct($bdd){
        $this->bdd = $bdd;
    }

    // public function getMonstres($id){
    //     $req = $this->bdd->prepare('SELECT * FROM monstres WHERE id = :id');
    //     $req->execute(array('id' => $id));
    //     $donnees = $req->fetch(PDO::FETCH_ASSOC);
    //     return new Monstres($donnees['nom'], $donnees['pointsDeVie'], $donnees['pointsAttaque'], $donnees['pointsDefense'], $donnees['experience'], $donnees['niveau'], $donnees['armeEquipee'], $donnees['passif'], $donnees['type'], $donnees['est_vivant'], $donnees['id_salle']);
    // }

    public function sauvegarderPartie($monstres){
        $req = $this->bdd->prepare('UPDATE monstres SET nom = :nom, pointsDeVie = :pointsDeVie, pointsAttaque = :pointsAttaque, pointsDefense = :pointsDefense, experience = :experience, niveau = :niveau, armeEquipee = :armeEquipee, passif = :passif, type = :type, est_vivant = :est_vivant WHERE id = :id');
        $req->execute(array(
            'nom' => $monstres->getNom(),
            'pointsDeVie' => $monstres->getPointsDeVie(),
            'pointsAttaque' => $monstres->getPointsAttaque(),
            'pointsDefense' => $monstres->getPointsDefense(),
            'experience' => $monstres->getExperience(),
            'niveau' => $monstres->getNiveau(),
            'armeEquipee' => $monstres->getArmeEquipee(),
            'passif' => $monstres->getPassif(),
            'type' => $monstres->getType(),
            'est_vivant' => $monstres->getEstVivant(),
            'id' => $monstres->getId()
        ));
    }

    function getMonstres($id){
        $req = $this->bdd->prepare('SELECT * FROM monstres WHERE id = :id');
        $req->execute(array('id' => $id));
        $donnees = $req->fetch(PDO::FETCH_ASSOC);
    }

    function ajouterMonstres($monstre){
        $req = $this->bdd->prepare('INSERT INTO monstres(nom, pointsDeVie, pointsAttaque, pointsDefense, experience, niveau, armeEquipee, passif, type, est_vivant, id_salle) VALUES(:nom, :pointsDeVie, :pointsAttaque, :pointsDefense, :experience, :niveau, :armeEquipee, :passif, :type, :est_vivant, :id_salle)');
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
            'id_salle' => $monstre->getIdSalle()
        ));
    }
    
}

$bdd = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8', $user, $password);


$monstresDAO = new MonstresDAO($bdd);

// Est vivant   1 = vivant, 0 = mort
$valeurParDefaut = "";
$type = "normal";







// Aykiu
// Monstres 1
$golemDeLaForet = new Monstres("Golem enfantin", 100, 10, 5, 0, 1, "Lianes acérés", "Vide", "Normal", 1, 1);
$monstresDAO->ajouterMonstres($golemDeLaForet);
// Monstres 2
$chimere = new Monstres("Chimère", 250, 20, 120, 80, 4, "Hache de la bête", "Vide", "Normal", 1, 4);
$monstresDAO->ajouterMonstres($chimere);
// Monstres 3
$gargouilleDePierre = new Monstres("Gargouille de pierre", 400, 30, 1200, 80, 4, "Lianes acérés", "Vide", "Normal", 1, 7);
$monstresDAO->ajouterMonstres($gargouilleDePierre);
// Monstres 4
$hydreVenimeuse = new Monstres("Hydre venimeuse", 850, 50, 2600, 100, 5, "Morsure toxique", "Poison", "Aquatique", 1, 10);
$monstresDAO->ajouterMonstres($hydreVenimeuse);
// Monstres 5
$dragonDeLave = new Monstres("Dragon de lave", 1200, 65, 3000, 120, 8, "Souffle de lave", "Feu", "Volant", 1, 13);
$monstresDAO->ajouterMonstres($dragonDeLave);
// Monstres 6
$lunairia = new Monstres("Lunairia", 2000, 110, 3400, 100, 6, "Lance divinatoire", "Grade incondescendant", "Boss", 1, 16);
$monstresDAO->ajouterMonstres($lunairia);

// /Franklin
// Monstres salle 1
$gobelin = new Monstres("Gobelin", 100, 10, 5, 0, 1, "Dague de la bête", "Vide", "Normal", 1, 2);
// Monstres salle 2
$ghoul = new Monstres("Ghoul", 280, 15, 60, 30, 2, "Cri de l'effroi", "Vide", "Normal", 1, 5);
$monstresDAO->ajouterMonstres($ghoul);
// Monstres salle 3
$fantomeErrant = new Monstres("fantome errant", 490, 25, 120, 30, 3, "Attaque fantomatique", "Vide", "Normal", 1, 8);
$monstresDAO->ajouterMonstres($fantomeErrant);
// Monstres salle 4
$golemDeLaForet = new Monstres("Golem de la foret", 740, 35, 2400, 80, 4, "Lianes acérés", "Vide", "Normal", 1, 11);
$monstresDAO->ajouterMonstres($golemDeLaForet);
// Monstres salle 5
$reineDesSorciere = new Monstres("Reine des Sorcière ", 1000, 55, 60, 100, 5, "Bâton de la rédemption", "Vide", "Boss", 1, 14);
$monstresDAO->ajouterMonstres($reineDesSorciere);
// Monstres salle 6
$Megicula = new Monstres("Megicula", 1600, 120, 1200, 110, 6, "Griffe de la bête", "Vide", "Boss", 1, 17);
$monstresDAO->ajouterMonstres($Megicula);


// Sidick
// Monstres salle 1
$palefroi = new Monstres("Palefroi", 100, 10, 5, 0, 1, "Sabot de la bête", "vide", "Normal", 1, 3);
$monstresDAO->ajouterMonstres($palefroi);
// Monstres salle 2
$ghoul = new Monstres("Ghoul", 280, 15, 60, 30, 2, "Cri de l'effroi", "vide", "Normal", 1, 5);
$monstresDAO->ajouterMonstres($ghoul);
// Monstres salle 3
$minautore = new Monstres("Minotaure", 250, 20, 120, 80, 4, "Hache de la bête", "vide", "Normal", 1, 9);
$monstresDAO->ajouterMonstres($minautore);
// Monstres salle 4
$demon = new Monstres("Démon", 350, 30, 320, 80, 5, "Epée de l'avenant", "vide", "Normal", 1, 12);
$monstresDAO->ajouterMonstres($demon);
// Monstres salle 5
$angesDechu = new Monstres("Ange déchu", 650, 500, 95, 100, 5, "Lame du déchu", "vide", "Normal", 1, 15);
$monstresDAO->ajouterMonstres($angesDechu);
// Monstres salle 6
$roiDemon = new Monstres("Roi des démons", 2000, 110, 3400, 100, 6, "Epée de la mort", "Rage démoniaque", "Boss", 1, 18);
$monstresDAO->ajouterMonstres($roiDemon);



?>