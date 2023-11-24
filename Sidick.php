<<<<<<< HEAD
<?php

require_once('Personnage.php');
require_once('Config.php');

class Sidick extends Personnage{
    protected $bdd;
    protected $nom;
    protected $pointsDeVie;
    protected $pointsAttaque;
    protected $pointsDefense;
    protected $experience ;
    protected $niveau ;
    protected $armeEquipee;
    protected $passif = "Rage";
    protected $type = "Berserker";
    // protected $embleme = "";

    public function __construct($nomSidick, $pvSidick, $paSidick, $pdSidick, $xpSidick, $lvlSidick, $armeSidick){
        $this->nom = $nomSidick;
        $this->pointsDeVie = $pvSidick;
        $this->pointsAttaque = $paSidick;
        $this->pointsDefense = $pdSidick;
        $this->experience = $xpSidick;
        $this->niveau = $lvlSidick;
        $this->armeEquipee = $armeSidick;
    }

    public function instanceVariables(){
        //Sidick variables
        $this->nom = "Sidick";
        $this->pointsDeVie = 150;
        $this->pointsAttaque = 10;
        $this->pointsDefense = 10;
        $this->experience = 0;
        $this->niveau = 1;
        $this->armeEquipee = "Epée en bois";
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

    public function getArmeEquipee(){
        return $this->armeEquipee;
    }

    public function setPointsDeVie($pointsDeVie){
        if ($this->pointsDeVie <= 0){
            $this->pointsDeVie = 0;
        }
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
    
}

$sidick = new Sidick("", 0, 0, 0, 0, 0, "");

$sidick->instanceVariables();

echo $sidick->getNom();
=======
<?php

require_once('Personnage.php');
require_once('Config.php');

class Sidick extends Personnage{
    protected $bdd;
    protected $nom;
    protected $pointsDeVie;
    protected $pointsAttaque;
    protected $pointsDefense;
    protected $experience ;
    protected $niveau ;
    protected $armeEquipee;
    protected $passif = "Rage";
    protected $type = "Berserker";
    // protected $embleme = "";

    public function __construct($nomSidick, $pvSidick, $paSidick, $pdSidick, $xpSidick, $lvlSidick, $armeSidick){
        $this->nom = $nomSidick;
        $this->pointsDeVie = $pvSidick;
        $this->pointsAttaque = $paSidick;
        $this->pointsDefense = $pdSidick;
        $this->experience = $xpSidick;
        $this->niveau = $lvlSidick;
        $this->armeEquipee = $armeSidick;
    }

    public function instanceVariables(){
        //Sidick variables
        $this->nom = "Sidick";
        $this->pointsDeVie = 150;
        $this->pointsAttaque = 10;
        $this->pointsDefense = 10;
        $this->experience = 0;
        $this->niveau = 1;
        $this->armeEquipee = "Epée en bois";
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

    public function getArmeEquipee(){
        return $this->armeEquipee;
    }

    public function setPointsDeVie($pointsDeVie){
        if ($this->pointsDeVie <= 0){
            $this->pointsDeVie = 0;
        }
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
    
}

$sidick = new Sidick("", 0, 0, 0, 0, 0, "");

$sidick->instanceVariables();

echo $sidick->getNom();
>>>>>>> aed68aaeafbeb5beaa07bea76416f47dc0b26542
?>