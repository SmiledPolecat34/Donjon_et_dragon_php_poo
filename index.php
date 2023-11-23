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
    private $passif;
    private $type;
    private $est_vivant = true;

    public function __construct($nom, $pointsDeVie, $pointsAttaque, $pointsDefense, $experience, $niveau, $armeEquipee, $passif, $type){
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

    public function getArmeEquipee(){
        return $this->ArmeEquipee;
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
    
    public function setArmeEquipee($armeEquipee){
        $this->armeEquipee = $arm;
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

class Aykiu extends Personnage{
    protected $bdd;
    protected $nom = "Aykiu";
    protected $pointsDeVie = 110;
    protected $pointsAttaque = 13;
    protected $pointsDefense = 8;
    protected $experience = 0;
    protected $niveau = 1;
    protected $armeEquipee;
    protected $passif = "Sacrifice de la déesse lunairia";
    protected $type = "Archer";
    // protected $embleme = "Lunairia";
    // Ajouter dans le constructeur un embleme
    // et faire pareil pour les autres personnages

    // sacrifier des pv 30% pour one shot un monstre

    public function __construct($nom, $pointsDeVie, $pointsAttaque, $pointsDefense, $experience, $niveau, $armeEquipee){
        $this->nom = $nom;
        $this->pointsDeVie = $pv;
        $this->pointsAttaque = $pa;
        $this->pointsDefense = $pd;
        $this->experience = $xp;
        $this->niveau = $lvl;
        $this->armeEquipee = $armeEquipee;

    }
}

class Franklin extends Personnage{
    protected $bdd;
    protected $nom = "Franklin";
    protected $pointsDeVie = 120;
    protected $pointsAttaque = 12;
    protected $pointsDefense = 5;
    protected $experience = 0;
    protected $niveau = 1;
    protected $armeEquipee;
    protected $passif = "Altération de la réalité";
    protected $type = "Mage";
    // protected $embleme = "Megicula";

    public function __construct($nom, $pointsDeVie, $pointsAttaque, $pointsDefense, $experience, $niveau, $armeEquipee){
        $this->nom = $nom;
        $this->pointsDeVie = $pv;
        $this->pointsAttaque = $pa;
        $this->pointsDefense = $pd;
        $this->experience = $xp;
        $this->niveau = $lvl;
        $this->armeEquipee = $armeEquipee;
    }

}

class Sidick extends Personnage{
    protected $bdd;
    protected $nom = "Sidick";
    protected $pointsDeVie = 150;
    protected $pointsAttaque;
    protected $pointsDefense = 10;
    protected $experience = 0;
    protected $niveau = 1;
    protected $armeEquipee;
    protected $passif = "Rage";
    protected $type = "Berserker";
    // protected $embleme = "";

    public function __construct($nom, $pointsDeVie, $pointsAttaque, $pointsDefense, $experience, $niveau, $armeEquipee){
        $this->nom = $nom;
        $this->pointsDeVie = $pv;
        $this->pointsAttaque = $pa;
        $this->pointsDefense = $pd;
        $this->experience = $xp;
        $this->niveau = $lvl;
        $this->armeEquipee = $armeEquipee;
    }


}

// Création des personnages
// $aykiu = new Personnage("Aykiu", 110, 13, 8, 0, 1, $arc);
// $franklin = new Personnage("Franklin", 120, 12 , 5, 0, 1, $batonMagique);
// $sidick = new Personnage("Sidick", 150, 17, 10, 0, 1,$epee);

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Classes pour les armes
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
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
        return new Salle($donnees['nom'], $donnees['type'], $donnees['description']);
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

class SalleSpecialeDAO{
    private $bdd;

    public function __construct($bdd){
        $this->bdd = $bdd;
    }

    public function getSalleSpeciale($id){
        $req = $this->bdd->prepare('SELECT * FROM salles_speciales WHERE id = :id');
        $req->execute(array('id' => $id));
        $donnees = $req->fetch(PDO::FETCH_ASSOC);
        return new SalleSpeciale($donnees['nom'], $donnees['type'], $donnees['description'], $donnees['specialite']);
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

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Combat
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
class InvenraireDAO{
    private $bdd;

    public function __construct($bdd){
        $this->bdd = $bdd;
    }

    public function getInventaire($id){
        $req = $this->bdd->prepare('SELECT * FROM inventaire WHERE id = :id');
        $req->execute(array('id' => $id));
        $donnees = $req->fetch(PDO::FETCH_ASSOC);
        return new Inventaire($donnees['id'], $donnees['arme'], $donnees['armure'], $donnees['potion'], $donnees['objet']);
    }

}

class Menu {

}

class Enigme{
    private $bdd;
    private $personnage;
    private $monstre;
    private $salle;
    private $menu;
    private $personnageDAO;
    private $monstreDAO;
    private $salleDAO;
    private $menuDAO;

    public function __construct($bdd, $personnage, $monstre, $salle, $menu, $personnageDAO, $monstreDAO, $salleDAO, $menuDAO){
        $this->bdd = $bdd;
        $this->personnage = $personnage;
        $this->monstre = $monstre;
        $this->salle = $salle;
        $this->menu = $menu;
        $this->personnageDAO = $personnageDAO;
        $this->monstreDAO = $monstreDAO;
        $this->salleDAO = $salleDAO;
        $this->menuDAO = $menuDAO;
    }

    public function getPersonnage(){
        return $this->personnage;
    }

    public function getMonstre(){
        return $this->monstre;
    }

    public function getSalle(){
        return $this->salle;
    }

    public function getMenu(){
        return $this->menu;
    }

    public function getPersonnageDAO(){
        return $this->personnageDAO;
    }

    public function getMonstreDAO(){
        return $this->monstreDAO;
    }

    public function getSalleDAO(){
        return $this->salleDAO;
    }

    public function getMenuDAO(){
        return $this->menuDAO;
    }

    public function setPersonnage($personnage){
        $this->personnage = $personnage;
    }

    public function setMonstre($monstre){
        $this->monstre = $monstre;
    }

    public function setSalle($salle){
        $this->salle = $salle;
    }

    public function setMenu($menu){
        $this->menu = $menu;
    }

    public function setPersonnageDAO($personnageDAO){
        $this->personnageDAO = $personnageDAO;
    }

    public function setMonstreDAO($monstreDAO){
        $this->monstreDAO = $monstreDAO;
    }

    public function setSalleDAO($salleDAO){
        $this->salleDAO = $salleDAO;
    }
} 


class Systeme {
    private $bdd;
    private $personnage;
    private $monstre;
    private $salle;
    private $menu;
    private $personnageDAO;
    private $monstreDAO;
    private $salleDAO;
    private $menuDAO;

    public function __construct($bdd, $personnage, $monstre, $salle, $menu, $personnageDAO, $monstreDAO, $salleDAO, $menuDAO){
        $this->bdd = $bdd;
        $this->personnage = $personnage;
        $this->monstre = $monstre;
        $this->salle = $salle;
        $this->menu = $menu;
        $this->personnageDAO = $personnageDAO;
        $this->monstreDAO = $monstreDAO;
        $this->salleDAO = $salleDAO;
        $this->menuDAO = $menuDAO;
    }

    public function getPersonnage(){
        return $this->personnage;
    }

    public function getMonstre(){
        return $this->monstre;
    }

    public function getSalle(){
        return $this->salle;
    }

    public function getMenu(){
        return $this->menu;
    }

    public function getPersonnageDAO(){
        return $this->personnageDAO;
    }

    public function getMonstreDAO(){
        return $this->monstreDAO;
    }

    public function getSalleDAO(){
        return $this->salleDAO;
    }

    public function getMenuDAO(){
        return $this->menuDAO;
    }

    public function setPersonnage($personnage){
        $this->personnage = $personnage;
    }

    public function setMonstre($monstre){
        $this->monstre = $monstre;
    }

    public function setSalle($salle){
        $this->salle = $salle;
    }

    public function setMenu($menu){
        $this->menu = $menu;
    }

    public function setPersonnageDAO($personnageDAO){
        $this->personnageDAO = $personnageDAO;
    }

    public function setMonstreDAO($monstreDAO){
        $this->monstreDAO = $monstreDAO;
    }

    public function setSalleDAO($salleDAO){
        $this->salleDAO = $salleDAO;
    }

    public function setMenuDAO($menuDAO){
        $this->menuDAO = $menuDAO;
    }

    public function combat($personnage, $monstre){
        while($personnage->getPointsDeVie() > 0 && $monstre->getPointsDeVie() > 0){
            $choix = readline("Que voulez-vous faire ? 1 : Attaquer, 2 : Défendre");
            switch($choix){
                case 1:
                    $personnage->attaquer($monstre);
                    $monstre->action($personnage);
                    echo "Vous attaquez le monstre !";
                    echo "Le monstre attaque !";
                    break;
                case 2:
                    $personnage->defendre($monstre);
                    $monstre->action($personnage);
                    echo "Vous vous défendez !";
                    echo "Le monstre attaque !";
                    break;
                default:
                    echo "Vous ne faites rien.";
                    $monstre->action($personnage);
                    echo "Le monstre $monstre->action($personnage);";
                    break;
            }
        }
        if($personnage->getPointsDeVie() <= 0){
            echo "Vous êtes mort !";
            exit();
        }
        else if($monstre->getPointsDeVie() <= 0){
            echo "Vous avez vaincu le monstre !";
            $aleatoire = rand(1, 10);
            if($aleatoire == 1 || $aleatoire == 4 || $aleatoire == 7 || $aleatoire == 10 || $aleatoire == 5 || $aleatoire == 8 || $aleatoire == 9){// 7 chances sur 10 d'avoir 1 point d'expérience
                $personnage->setExperience($personnage->getExperience() + 1);
                echo "Vous gagnez 1 point d'expérience !";
            }
            else if($aleatoire == 2 || $aleatoire == 6){// 2 chances sur 10 d'avoir 2 points d'expérience
                $personnage->setExperience($personnage->getExperience() + 2);
                echo "Vous gagnez 2 points d'expérience !";
            }
            else if($aleatoire == 3){
                $personnage->setExperience($personnage->getExperience() + 3); // 10% de chance d'avoir 3 points d'expérience
                echo "Vous gagnez 3 points d'expérience !";
            }
        }else{
            echo "Erreur";
        }
    }

    public function enigmes($personnage, $salle){
        $aleatoire = rand(1, 3);
        if($aleatoire == 1){
            echo "Vous trouvez une énigme !";
            $choix = readline("Quelle est la réponse ? 1 : 1, 2 : 2, 3 : 3");
            switch($choix){
                case 1:
                    echo "Mauvaise réponse !";
                    $personnage->setPointsDeVie($personnage->getPointsDeVie() - 5);
                    echo "Vous perdez 5 points de vie !";
                    break;
                case 2:
                    echo "Mauvaise réponse !";
                    $personnage->setPointsDeVie($personnage->getPointsDeVie() - 5);
                    echo "Vous perdez 5 points de vie !";
                    break;
                case 3:
                    echo "Bonne réponse !";
                    $personnage->setExperience($personnage->getExperience() + 1);
                    echo "Vous gagnez 1 point d'expérience !";
                    break;
                default:
                    echo "Vous ne faites rien.";
                    $personnage->setPointsDeVie($personnage->getPointsDeVie() - 5);
                    echo "Vous perdez 5 points de vie !";
                    break;
            }
        }
        else if($aleatoire == 2){
            echo "Vous trouvez une énigme !";
            $choix = readline("Quelle est la réponse ? 1 : 1, 2 : 2, 3 : 3");
            switch($choix){
                case 1:
                    echo "Mauvaise réponse !";
                    $personnage->setPointsDeVie($personnage->getPointsDeVie() - 5);
                    echo "Vous perdez 5 points de vie !";
                    break;
                case 2:
                    echo "Mauvaise réponse !";
                    $personnage->setPointsDeVie($personnage->getPointsDeVie() - 5);
                    echo "Vous perdez 5 points de vie !";
                    break;
                case 3:
                    echo "Bonne réponse !";
                    $personnage->setExperience($personnage->getExperience() + 1);
                    echo "Vous gagnez 1 point d'expérience !";
                    break;
                default:
                    echo "Vous ne faites rien.";
                    break;
            }
        }
        else

    public function lancerCombat($personnage, $monstre){
        $combat = new Combat();
        $combat->combat($personnage, $monstre);
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Bdd Cration
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



////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Création templates
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


// Création des armes de bases
$arcCommun = new Arme("Arc", 1,"Commun");
$batonMagiqueCommun = new Arme("Bâton Magique", 1,"Commun");
$epeeCommune = new Arme("Épée", 1,"Commun");


//épée amelioré
$épéeRare = new Arme("Épée longe en fer ", 25, "Rare");
$épéeEpique = new Arme("Lame maudite de muramasa", 40, "Epique");
$épéeLegendaire = new Arme("L'épée maudite du roi démon ", 40, "Légendaire");
$épéeMythologique = new Arme("La Tueuse de dieux", 60, "Mythologique");


// Arc amélioré
$arcRare = new Arme("Arc long en Acier ", 25, "Rare");
$arcEpique = new Arme("Arc des abysses  ", 40, "Epique");
$arcLegendaire = new Arme("Arc maudit du roi démon ", 40, "Légendaire");
$arcMythologique = new Arme("l'Arc tueur de dieux", 60, "Mythologique");

//Baton magique améliorer
$batonMagique = new Arme("baton long en Acier ", 25, "Rare");
$batonMagiqueEpique = new Arme("baton des abysses  ", 40, "Epique");
$batonMagiqueLegendaire = new Arme("baton maudit du roi démon ", 40, "Légendaire");
$batonMagiqueMythologique = new Arme("l'baton tueur de dieux", 60, "Mythologique");


// Équiper les armes aux personnages
$aykiu->equiperNouvelleArme($arc);
$franklin->equiperNouvelleArme($batonMagique);
$sidick->equiperNouvelleArme($epee);

//Monstres

$monstre = new Monstre("Squelette furieux", 100, 10, 5, 0, 1,);
$monstre = new Monstre("Ghoul", 100, 10, 5, 0, 1,);
$monstre = new Monstre("Cultiste corrompue", 100, 10, 5, 0, 1,);
$monstre = new Monstre("Démon", 100, 10, 5, 0, 1,);
$monstre = new Monstre("Gargouille enragé", 100, 10, 5, 0, 1,);
$monstre = new Monstre("fantome perdu", 100, 10, 5, 0, 1,);

$boss = new Monstre("Nécromancien", 100, 10, 5, 0, 1,);
$boss = new Monstre("Sorcière ", 100, 10, 5, 0, 1,);


?>