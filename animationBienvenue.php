<?php

function afficherProgressivement($texte, $delai = 20000) {
    $longueur = strlen($texte);

    for ($i = 0; $i < $longueur; $i++) {
        echo substr($texte, $i, 1);
        usleep($delai);
    }
}

function effacerProgressivement($longueur, $delai = 20000) {
    for ($i = $longueur - 1; $i >= 0; $i--) {
        echo "\033[D"; 
        echo "\033[K"; 
        usleep($delai);
    }
}

function afficherEtEffacer($texte, $delaiAvantEffacement = 2000000) {
    afficherProgressivement($texte);
    usleep($delaiAvantEffacement);
    effacerProgressivement(strlen($texte));
}

function afficherBienvenue() {
    echo "\033[2J"; 

    $texteBienvenue = " BIENVENUE CHER GUERRIER ";
    afficherEtEffacer($texteBienvenue);

    $texteSuite = " ----DANS---- ";
    afficherEtEffacer($texteSuite);

    $texteSuite ="DONJON ET DRAGON";
    afficherEtEffacer($texteSuite);
    
    afficherEtEffacer("VOUS ALLEZ ENTRER DANS NOTRE JEU AUSSI FANTASTIQUE QUE INCROYABLE", 2000000);




    
}


