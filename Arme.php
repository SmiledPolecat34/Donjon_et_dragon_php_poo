<?php

require_once('Config.php');


class Arme{
    private $nom;
    private $degats;
    private $rareté;
    private $niveauRequis;
    private $poids;
    private $est_maudite;
    private $effet_special;
    private $specialite;

    public function __construct($nom, $rareté, $niveauRequis, $degats, $poids, $est_maudite, $effet_special, $specialite){
        $this->nom = $nom;
        $this->rareté = $rareté;
        $this->niveauRequis = $niveauRequis;
        $this->degats = $degats;
        $this->poids = $poids;
        $this->est_maudite = $est_maudite;
        $this->effet_special = $effet_special;
        $this->specialite = $specialite;
    }

    public function getNom(){
        return $this->nom;
    }
    
    public function getDegats(){
        return $this->degats;
    }
    
    public function getRareté(){
        return $this->rareté;
    }

    public function getNiveauRequis(){
        return $this->niveauRequis;
    }

    public function getPoids(){
        return $this->poids;
    }

    public function getEstMaudite(){
        return $this->est_maudite;
    }

    public function getEffetSpecial(){
        return $this->effet_special;
    }

    public function getSpecialite(){
        return $this->specialite;
    }

    public function setNom($nom){
        $this->nom = $nom;
    }

    public function setDegats($degats){
        $this->degats = $degats;
    }


    public function setRareté($rareté){
        $this->rareté = $rareté;
    }

    public function setNiveauRequis($niveauRequis){
        $this->niveauRequis = $niveauRequis;
    }

    public function setPoids($poids){
        $this->poids = $poids;
    }

    public function setEstMaudite($est_maudite){
        $this->est_maudite = $est_maudite;
    }
    
    public function setEffetSpecial(){
        $this->effet_special = $effet_special;
    }

    public function setSpecialite($specialite){
        $this->specialite = $specialite;
    }

    public function ameliorer($arme){
        $arme->setDegats($arme->getDegats() + 1);
    }

    public function deblocageArmeEtEquipementArme($personnage){
        if($personnage->getNiveau() >= $arme->getNiveauRequis()){
            $personnage->setArmeEquipee($arme);
        }
    }

    public function afficherArme(){
        echo "Nom : $this->nom";
        echo "Rareté : $this->rareté";
        echo "Niveau requis : $this->niveauRequis";
        echo "Dégats : $this->degats";
        echo "Poids : $this->poids";
        echo "Est maudite : $this->est_maudite";
        echo "Effet spécial : $this->effet_special";
        echo "Spécialité : $this->specialite";
    }  

}

class ArmeDAO{
    private $bdd;

    public function __construct($bdd){
        $this->bdd = $bdd;
    }

    // public function getArme($id){
    //     $req = $this->bdd->prepare('SELECT * FROM armes WHERE id = :id');
    //     $req->execute(array('id' => $id));
    //     $donnees = $req->fetch(PDO::FETCH_ASSOC);
    //     return new Arme($donnees['nom'], $donnees['rarete'], $donnees['niveauRequis'], $donnees['degats'], $donnees['poids'], $donnees['est_maudite'], $donnees['effet_special'], $donnees['specialite']);
    // }

    public function ajouterArme($arme){
        $req = $this->bdd->prepare('INSERT INTO armes(nom, rarete, degats, niveauRequis, poids, est_maudite, effet_special, specialite) VALUES(:nom, :rarete, :degats, :niveauRequis, :poids, :est_maudite, :effet_special, :specialite)');
        $req->execute(array(
            'nom' => $arme->getNom(),
            'rarete' => $arme->getRareté(),
            'niveauRequis' => $arme->getNiveauRequis(),
            'degats' => $arme->getDegats(),
            'poids' => $arme->getPoids(),
            'est_maudite' => $arme->getEstMaudite(),
            'effet_special' => $arme->getEffetSpecial(),
            'specialite' => $arme->getSpecialite()
        ));
        
    }


}




$bdd = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8', $user, $password);

// $armeDAO = new ArmeDAO($bdd);
// Création des armes de bases
// $arcCommun = new Arme("Arc", "Commun", 1, 25, 10, 0, 0, "Waw");
// $batonMagiqueCommun = new Arme("Bâton Magique", "Commun", 1, 17, 6, 0, 0, "");
// $epeeCommune = new Arme("Épée", "Commun", 1, 40, 30, 0, 0, "");

// $armeDAO->ajouterArme($arcCommun);
// $armeDAO->ajouterArme($batonMagiqueCommun);
// $armeDAO->ajouterArme($epeeCommune);


// //épée amelioré
// $épéeRare = new Arme("Épée longue en fer ", 25, "Rare");
// $épéeEpique = new Arme("Lame maudite de muramasa", 40, "Epique");
// $épéeLegendaire = new Arme("L'épée maudite du roi démon ", 40, "Légendaire");
// $épéeMythologique = new Arme("La Tueuse de dieux", 60, "Mythologique");
// 
// 
// Arc amélioré
// $arcRare = new Arme("Arc long en Acier ", 25, "Rare");
// $arcEpique = new Arme("Arc des abysses  ", 40, "Epique");
// $arcLegendaire = new Arme("Arc bénis de Lunairia ", 40, "Légendaire");
// $arcMythologique = new Arme("l'Arc tueur de dieux", 60, "Mythologique");
// 
// Baton magique améliorer
// $batonMagique = new Arme(" L'illusioniste", 25, "Rare");
// $batonMagiqueEpique = new Arme("Le jugement", 40, "Epique");
// $batonMagiqueLegendaire = new Arme("Sceptre de Megicula", 40, "Légendaire");
// $batonMagiqueMythologique = new Arme("Le bois d'adam", 60, "Mythologique");

?>