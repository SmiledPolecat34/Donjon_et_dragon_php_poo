<?php
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Classes pour le personnage
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

class PersonnageDAO{
    private $bdd;
    
    public function __construct($bdd){
        $this->bdd = $bdd;
    }
    
    public function getPersonnage($id){
        $req = $this->bdd->prepare('SELECT * FROM personnages WHERE id = :id');
        $req->execute(array('id' => $id));
        $donnees = $req->fetch(PDO::FETCH_ASSOC);
        return new Personnage($donnees['nom'], $donnees['pointsDeVie'], $donnees['pointsAttaque'], $donnees['pointsDefense'], $donnees['experience'], $donnees['niveau'], $donnees['armeEquipee']);
    }

}

class Personnage {
    private $bdd;
    private $nom;
    private $pointsDeVie;
    private $pointsAttaque;
    private $pointsDefense;
    private $experience;
    private $niveau;
    private $armeEquipee;

    public function __construct($nom, $pointsDeVie, $pointsAttaque, $pointsDefense, $experience, $niveau, $armeEquipee){
        $this->nom = $nom;
        $this->pointsDeVie = $pv;
        $this->pointsAttaque = $pa;
        $this->pointsDefense = $pd;
        $this->experience = $xp;
        $this->niveau = $lvl;
        $this->armeEquipee = $armeEquipee;

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

    public function getArmeEquipee(){
        return $this->ArmeEquipee;
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
        $this->armeEquipee = $arm;
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

// Création des personnages
$aykiu = new Personnage("Aykiu", 110, 13, 8, 0, 1, $arc);
$franklin = new Personnage("Franklin", 120, 12 , 5, 0, 1, $batonMagique);
$sidick = new Personnage("Sidick", 150, 17, 10, 0, 1,$epee);

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Classes pour les armes
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

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


// Création des armes de bases
$arcCommun = new Arme("Arc", 1,"Commun");
$batonMagiqueCommun = new Arme("Bâton Magique", 1,"Commun");
$epeeCommune = new Arme("Épée", 1,"Commun");

// Arc amélioré

$arcRare = new Arme("Arc Rare", 25, "Rare");
$arcEpique = new Arme("Épée Epique", 40, "Epique");
$arcLegendaire = new Arme("Épée légendaire", 40, "Légendaire");
$arcMythologique = new Arme("Arc mythologique", 60, "Mythologique");


// Équiper les armes aux personnages
$aykiu->equiperNouvelleArme($arc);
$franklin->equiperNouvelleArme($batonMagique);
$sidick->equiperNouvelleArme($epee);

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Classes pour les salles
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

class SalleDAO{
    private $bdd;

    public function __construct($bdd){
        $this->bdd = $bdd;
    }

    public function getSalle($id){
        $req = $this->bdd->prepare('SELECT * FROM salles WHERE id = :id');
        $req->execute(array('id' => $id));
        $donnees = $req->fetch(PDO::FETCH_ASSOC);
        return new Salle($donnees['type'], $donnees['description']);
    }
}

class Salle {
    public $nom; // Nom de la salle
    public $type; // Le type de salle
    public $description; // Description de la salle

    // Constructeur
    public function __construct($type, $description) {
        $this->type = $type;
        $this->description = $description;
    }

    // Méthode pour décrire la salle
    public function decrireSalle() {
        return "Type de salle : {$this->type}. Description : {$this->description}";
    }

    public function quitterSalle(){
        $this->type = "vide";
        $this->description = "vide";
    }

    public function entrerSalle($salle){
        $this->type = $salle->getType();
        $this->description = $salle->getDescription();
    }

    public function explorerDonjon($personnage){
        $aleatoire = rand(1, 3);
        if($aleatoire == 1){
            $this->type = "vide";
            $this->description = "vide";
            echo "Il n'y a rien de spécial dans cette salle.";
        }
        else if($aleatoire == 2){
            $this->type = "monstre";
            $this->description = "monstre";
            echo "Un monstre se trouve dans cette salle. Vous devez le combattre.";

        }
        else if($aleatoire == 3){
            $this->type = "tresor";
            $this->description = "tresor";
            echo "Un trésor se trouve dans cette salle. Vous pouvez l'ouvrir.";
        }
    }

    public function changerSalle($salle){
        quitterSalle();
        entrerSalle($salle);
    }

    public function getType(){
        return $this->type;
    }

    public function getDescription(){
        return $this->description;
    }

    public function setType($type){
        $this->type = $type;
    }

    public function setDescription($description){
        $this->description = $description;
    }
    
}

class SalleSpeciale extends Salle {
    public $specialite; // Enigme, piège, marchand, etc.

    // Constructeur
    public function __construct($type, $description, $specialite) {
        parent::__construct($type, $description);
        $this->specialite = $specialite;
    }

    // Méthode pour décrire la salle spéciale
    public function decrireSalleSpeciale() {
        return parent::decrireSalle() . ". Spécialité : {$this->specialite}";
    }
}

class monstres extends Personnage{
    private $bdd;
    private $nom;
    private $pointsDeVie;
    private $pointsAttaque;
    private $pointsDefense;
    private $experience;
    private $niveau;
    private $armeEquipee;

    public function __construct($nom, $pointsDeVie, $pointsAttaque, $pointsDefense, $experience, $niveau, $armeEquipee){
        $this->nom = $nom;
        $this->pointsDeVie = $pv;
        $this->pointsAttaque = $pa;
        $this->pointsDefense = $pd;
        $this->experience = $xp;
        $this->niveau = $lvl;
        $this->armeEquipee = $armeEquipee;

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

    public function getArmeEquipee(){
        return $this->ArmeEquipee;
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
        $this->armeEquipee = $arm;
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
        
        public function appelALaide($personnage, $monstre){
            $monstre = new Monstre("Monstre", 100, 10, 5, 0, 1, $epee);
            $monstre->action($personnage);
        }

        public function action($personnage){
            $aleatoire = rand(1, 10);
            if($aleatoire == 1 || $aleatoire == 8 || $aleatoire == 9){
                $this->attaquer($personnage);
                echo "Le monstre attaque !";
            }
            else if($aleatoire == 2 || $aleatoire == 6 || $aleatoire == 7){
                $this->defendre($personnage);
                echo "Le monstre se défend !";
            }
            else if($aleatoire == 3 || $aleatoire == 5 || $aleatoire == 10){
                $this->ameliorer($personnage);
                echo "Le monstre s'améliore !";
            }
            else if($aleatoire == 4){
                $this->appelALaide($personnage);
                echo "Le monstre appelle un autre monstre à l'aide !";
            }
        }
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Lancement
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

try{
    $bdd = new PDO('mysql:host=localhost;dbname=donjon;charset=utf8', 'root', 'paulwifi');
}
catch(Exception $e){
    die('Erreur : ' . $e->getMessage());
}


?>