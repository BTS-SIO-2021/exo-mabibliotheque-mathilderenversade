<?php

require __DIR__.'/inc/db.php';

var_dump($_POST);
$var = '';
if($var !== ''){
    echo 'je ne suis pas vide';
}else {
    echo 'je suis vide';
}

if(!empty($var)){
    echo 'je suis pas empty';
} else {
    echo 'Je suis empty';
}

if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password-check']))
{
    
    if(!empty($_POST['username']) && $_POST['password']!=='') 
    {
        if($_POST['password'] === $_POST['password-check'])
        {
            $databaseConnexion = new DB;
            $pdo = $databaseConnexion->getPDO();
            $newUserName = $_POST['username'];
            $newUserPass = $_POST['password'];
            $sqlNewUser = 'INSERT into utilisateurs(username, password) VALUES (:username, :password);';
            $requetePrepare = $pdo->prepare($sqlNewUser);
            $requetePrepare->bindValue(':username', $newUserName);
            $requetePrepare->bindValue(':password', $newUserPass);
            $result = $requetePrepare->execute();

            var_dump($result);
            if($result==true){
                header('Location:connexion.php');
            } else{
                header('Location:inscription.php?erreur=3');
            }

        }
    }
}

require __DIR__.'/view/inscriptionform.tpl.php';

?>