<?php

require_once('EnigmeDAO.php');

class Enigme{
    private $question;
    private $reponse_correcte;
    private $reponse_fausse_1;
    private $reponse_fausse_2;
    private $reponse_fausse_3;
    private $recompense;

    public function __construct($question, $reponse_correcte, $reponse_fausse_1, $reponse_fausse_2, $reponse_fausse_3, $recompense){
        $this->question = $question;
        $this->reponse_correcte = $reponse_correcte;
        $this->reponse_fausse_1 = $reponse_fausse_1;
        $this->reponse_fausse_2 = $reponse_fausse_2;
        $this->reponse_fausse_3 = $reponse_fausse_3;
        $this->recompense = $recompense;
    }

    public function getQuestion(){
        return $this->question;
    }

    public function getReponseCorrecte(){
        return $this->reponse_correcte;
    }

    public function getReponseFausse1(){
        return $this->reponse_fausse_1;
    }

    public function getReponseFausse2(){
        return $this->reponse_fausse_2;
    }

    public function getReponseFausse3(){
        return $this->reponse_fausse_3;
    }

    public function getRecompense(){
        return $this->recompense;
    }

    public function setQuestion($question){
        $this->question = $question;
    }

    public function setReponseCorrecte($reponse_correcte){
        $this->reponse_correcte = $reponse_correcte;
    }

    public function setReponseFausse1($reponse_fausse_1){
        $this->reponse_fausse_1 = $reponse_fausse_1;
    }

    public function setReponseFausse2($reponse_fausse_2){
        $this->reponse_fausse_2 = $reponse_fausse_2;
    }

    public function setReponseFausse3($reponse_fausse_3){
        $this->reponse_fausse_3 = $reponse_fausse_3;
    }

    public function setRecompense($recompense){
        $this->recompense = $recompense;
    }

    public function afficherEnigme(){
        echo "Question : $this->question";
        echo "1 : $this->reponse_correcte";
        echo "2 : $this->reponse_fausse_1";
        echo "3 : $this->reponse_fausse_2";
        echo "4 : $this->reponse_fausse_3";
    }

    public function repondreEnigme($choix){
        if($choix == $this->reponse_correcte){
            echo "Bonne réponse !";
            return true;
        }
        else{
            echo "Mauvaise réponse !";
            return false;
        }
    }

    public function donnerRecompense($personnage){
        $personnage->setExperience($personnage->getExperience() + $this->recompense);
    }

    public function lancerEnigme($personnage){
        $enigme = new Enigme();
        $enigme->afficherEnigme();
        $choix = readline("Quelle est la bonne réponse ? 1, 2, 3, 4");
        $enigme->repondreEnigme($choix);
        if($enigme->repondreEnigme($choix) == true){
            $enigme->donnerRecompense($personnage);
        }else{
            $personnage->setPointsDeVie($personnage->getPointsDeVie() - 20);
            echo "Vous perdez 5 points de vie !";
        }
    }
}
class EnigmeDAO{
    private $bdd;

    public function __construct($bdd){
        $this->bdd = $bdd;
    }

    public function getEnigme($id){
        $req = $this->bdd->prepare('SELECT * FROM enigmes WHERE id = :id');
        $req->execute(array('id' => $id));
        $donnees = $req->fetch(PDO::FETCH_ASSOC);
        return new Enigme($donnees['question'], $donnees['reponse_correcte'], $donnees['reponse_fausse_1'], $donnees['reponse_fausse_2'], $donnees['reponse_fausse_3'], $donnees['recompense']);
    }


}
?>