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

// Enigme Aykiu////////////////////////////////////////////////////////////////////////////////////

$enigmesAykiu = array(
    new Enigme("Je suis une créature volante avec des écailles, cracheur de feu, et souvent considéré comme un gardien de trésor. Qui suis-je ?", array(
        "Minotaure" => false,
        "Gobelin" => false,
        "Chimère" => false,
        "Dragon" => true
    )),
),
new Enigme(
    "Je suis une arme légendaire autrefois utilisée par les héros pour combattre les forces du mal. Qu'est-ce que je suis ?",
    array(
        "Baguette magique" => false,
        "Arc long" => false,
        "Épée légendaire" => true,
        "Marteau de guerre" => false
    )
),
new Enigme(
    "Je suis une créature qui se cache dans l'ombre, embusquée dans les donjons, attendant de bondir sur les intrus. Qui suis-je ?",
    array(
        "Kobold" => false,
        "Troll" => false,
        "Gobelin" => false,
        "Ombre" => true
    )
),
new Enigme(
    "Je suis une sphère magique qui peut prédire l'avenir et répondre à des questions. Que suis-je ?",
    array(
        "Pierre de téléportation" => false,
        "Boule de feu" => false,
        "Bouclier réflecteur" => false,
        "Boule de cristal" => true
    )
),
new Enigme(
    "Je suis une relique ancienne, généralement ornée de pierres précieuses, et je confère des pouvoirs magiques à celui qui me porte. Qu'est-ce que je suis ?",
    array(
        "Couronne enchantée" => false,
        "Amulette du pouvoir" => false,
        "Bracelet d'invocation" => false,
        "Artefact magique" => true
    )
),
new Enigme(
    "Je suis un sortilège puissant qui invoque des créatures pour combattre aux côtés du lanceur. Quel sort suis-je ?",
    array(
        "Explosion arcanique" => false,
        "Métamorphose" => false,
        "Télékinésie" => false,
        "Invocation de familiers" => true
    )
),

afficherEnigme($enigmesAykiu[0]);

//////////////// enigme Franklin////////////////////////////////////////////////////////////////////////////////////

$enigmesFranklin = array(
    new Enigme(
        "Je suis une créature nocturne, souvent associée à la magie noire, et je me nourris de la peur des mortels. Qui suis-je ?",
        array(
            "Liche" => false,
            "Harpie" => false,
            "Goule" => false,
            "Vampire" => true
        )
    ),
    new Enigme(
        "Je suis une forteresse sombre et menaçante, habitée par des créatures maléfiques. Qu'est-ce que je suis ?",
        array(
            "Tour de sorcier" => false,
            "Forteresse naine" => false,
            "Donjon" => true,
            "Château elfique" => false
        )
    ),
    new Enigme(
        "Je suis une arme enchantée qui peut infliger des dégâts supplémentaires aux créatures magiques. Qu'est-ce que je suis ?",
        array(
            "Dague empoisonnée" => false,
            "Arc elfique" => false,
            "Lame enchantée anti-magie" => true,
            "Lance de démon" => false
        )
    ),
    new Enigme(
        "Je suis une créature mythique avec des ailes, une crinière de feu, et je suis souvent monté par des chevaliers. Qui suis-je ?",
        array(
            "Wyrm" => false,
            "Hippogriffe" => true,
            "Griffon" => false,
            "Dragonnet" => false
        )
    ),
    new Enigme(
        "Je suis un sort qui manipule le temps, permettant au lanceur de revivre un moment précédent. Quel sort suis-je ?",
        array(
            "Tempête temporelle" => false,
            "Distorsion spatio-temporelle" => false,
            "Rappel temporel" => false,
            "Manipulation temporelle" => true
        )
    ),
    new Enigme(
        "Je suis un objet magique qui peut révéler la vérité et détecter les illusions. Qu'est-ce que je suis ?",
        array(
            "Œil de vérité" => true,
            "Pierre de détection" => false,
            "Amulette de discernement" => false,
            "Bouclier de vérité" => false
        )
    )
);

afficherEnigme($enigmesFranklin[0]);


//////////////// enigme Sidick////////////////////////////////////////////////////////////////////////////////////

$enigmesSidick = array(
    new Enigme(
        "Je suis une créature massive avec une carapace solide et une attaque redoutable. Qui suis-je ?",
        array(
            "Ogre" => false,
            "Troll" => false,
            "Géant" => false,
            "Minotaure" => true
        )
    ),
    new Enigme(
        "Je suis une boisson favorite des aventuriers, brassée avec des ingrédients magiques. Qu'est-ce que je suis ?",
        array(
            "Élixir d'invisibilité" => false,
            "Potion de guérison" => true,
            "Potion de force" => false,
            "Jus d'ombre" => false
        )
    ),
    new Enigme(
        "Je suis un artefact antique qui confère à celui qui me porte une résistance accrue et des compétences spéciales. Qu'est-ce que je suis ?",
        array(
            "Œil du dragon" => false,
            "Collier de protection" => false,
            "Bouclier d'invincibilité" => false,
            "Artefact de protection" => true
        )
    ),
    new Enigme(
        "Je suis une créature mythique qui peut guider les aventuriers vers des trésors cachés. Qui suis-je ?",
        array(
            "Harpie" => false,
            "Sphinx" => true,
            "Basilic" => false,
            "Chimère" => false
        )
    ),
    new Enigme(
        "Je suis un sort qui crée une barrière invisible pour protéger le lanceur et ses alliés. Quel sort suis-je ?",
        array(
            "Mur de feu" => false,
            "Barrière magique" => false,
            "Bouclier arcanique" => false,
            "Sort de bouclier" => true
        )
    ),
    new Enigme(
        "Je suis un lieu mystique où l'on peut acheter et vendre des équipements magiques. Où suis-je ?",
        array(
            "Forge naine" => false,
            "Boutique d'alchimie" => false,
            "Taverne magique" => false,
            "Boutique d'objets magiques" => true
        )
    )
);

afficherEnigme($enigmesSidick[0]);

// Fonction pour afficher une énigme avec des choix
function afficherEnigme($enigme) {
echo $enigme->getQuestion() . "\n";
foreach ($enigme->getChoix() as $choix => $correct) {
    echo "$choix) $choix\n";
}
}