<?php

// Inclusion du fichier s'occupant de la connexion à la DB (TODO)

// Initialisation de variables (TODO) (évite les "NOTICE - variable inexistante")
$bookList = array();
$genreList = array();
$name = '';
$author = '';
$release_date = '';
$genre = '';

// Si le formulaire a été soumis
if (!empty($_POST)) {
    // Récupération des valeurs du formulaire dans des variables // TO DO #3 (optionnel) valider les données reçues (ex: donnée non vide)
    
    // TO DO #3 Insertion en DB d'un livre
    $insertQuery = "
 
    ";
    // TODO #3 exécuter la requête qui insère les données


    // TODO #3 une fois inséré, faire une redirection vers la page "index.php" (fonction header : https://www.php.net/manual/fr/function.header.php)


    }

// Liste des Genres
// TODO #4 récupérer cette liste depuis la base de données

$genreList = array(
    1 => 'Drame',
    2 => 'Poésie',
    3 => 'Je suis un genre statique',
    4 => 'Salut'
);




// TODO #1 écrire la requête SQL permettant de récupérer les livres en base de données (mais ne pas l'exécuter maintenant)
$sql = '

';

// Si un tri a été demandé, on réécrit la requête
if (!empty($_GET['order'])) {
    // Récupération du tri choisi
    $order = trim($_GET['order']);
    if ($order == 'name') {
        // TODO #2 écrire la requête avec un tri par nom croissant
        $sql = '
            
        ';
    }
    else if ($order == 'author') {
        // TODO #2 écrire la requête avec un tri par autheur croissant
        $sql = '
     
        ';
    }
}
// TODO #1 exécuter la requête contenue dans $sql et récupérer les valeurs dans la variable $BookList


// Inclusion du fichier s'occupant d'afficher le code HTML (TODO)
