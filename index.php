<?php

// Inclusion du fichier s'occupant de la connexion à la DB (TODO)
require __DIR__.'/inc/db.php';

$databaseConnexion = new DB;

$pdo = $databaseConnexion->getPDO();



// Initialisation de variables (évite les "NOTICE - variable inexistante")
$bookList = array();
$genreList = array();
$name = '';
$author = '';
$release_date = '';
$genre = '';

// Si le formulaire a été soumis
if (!empty($_POST)) {
    // Récupération des valeurs du formulaire dans des variables // TO DO #3 (optionnel) valider les données reçues (ex: donnée non vide)
    // Je suis allée voir mon formulaire et la méthode d'envoi des données c'est POST donc je vais utiliser la super-globale $_POST
    var_dump($_POST);
    // ATTENTION LA DONNEE CONTENUE DANS $_POST VIENT D'UN UTILISATEUR DONC RISQUE D'ATTAQUE !! Je dois "purifier" la donnée reçue pour me protéger
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $name = htmlspecialchars($_POST['name']);
    $name = strip_tags($name);
    
    $author = isset($_POST['author']) ? $_POST['author'] : '';
    $release_date=isset($_POST['release_date']) ? $_POST['release_date'] : '';
    $genre=isset($_POST['genre']) ? $_POST['genre'] : '';
   
    $test = [$name, $author, $release_date, $genre];
    var_dump($test);
    
    // TO DO #3 Insertion en DB d'un livre
    $insertQuery = "INSERT into book (name, author, release_date, genre_id) VALUES (:name, :author, :release_date, :genre);";    
    // TODO #3 exécuter la requête qui insère les données
    $requetePrepare = $pdo->prepare($insertQuery);
    $requetePrepare->bindValue(':name', $name);
    $requetePrepare->bindValue(':author', $author);
    $requetePrepare->bindValue(':release_date', $release_date);
    $requetePrepare->bindValue(':genre', $genre);

    $resultats = $requetePrepare->execute();
    var_dump($resultats);

    // TODO #3 une fois inséré, faire une redirection vers la page "index.php" (fonction header : https://www.php.net/manual/fr/function.header.php)
    header('Location:index.php');

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
$sql = 'SELECT * from book';

// Si un tri a été demandé, on réécrit la requête
if (!empty($_GET['order'])) {
    // Récupération du tri choisi
    $order = trim($_GET['order']);
    if ($order == 'name') {
        // TODO #2 écrire la requête avec un tri par nom croissant
        $sql = 'SELECT * from book ORDER BY name ASC';
    }
    else if ($order == 'author') {
        // TODO #2 écrire la requête avec un tri par autheur croissant
        $sql = 'SELECT * from book ORDER BY author ASC';
    }
}
// TODO #1 exécuter la requête contenue dans $sql et récupérer les valeurs dans la variable $BookList
$pdoStatement = $pdo->query($sql);
$bookList = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
//var_dump($bookList);


// Inclusion du fichier s'occupant d'afficher le code HTML 
require __DIR__.'/view/book.php';
