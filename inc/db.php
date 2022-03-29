<?php

// TODO #1 créer un objet PDO permettant de se connecter à la base de données "book"
// et le stocker dans la variable $pdo

class DB {

    private $pdo;

    function __construct()
    {
        $dsn='mysql:host=localhost;dbname=book';
        $user='book';
        $mdp='book';

        try {
            $connexionDB = new PDO($dsn, $user, $mdp);
        } catch (PDOException $erreur){
            echo 'Connexion échouée car'.$erreur->getMessage();
        }

        $this->pdo = $connexionDB; 
    }

    public function getPDO(){
        return $this->pdo;
    }
}


