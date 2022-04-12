<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'inscription</title>
</head>
<body>
    <form action='' method='POST'>
        <h1>Formulaire Inscription</h1>
        <label>Nom d'utilisateur</label>
        <input type="text" placeholder="Entrez votre nom" name="username" required>
        <label>Mot de passe</label>
        <input type="password" placeholder="Entrez votre mot de passe" name="password" required>
        <label>Vérifier le mot de passe</label>
        <input type="password" placeholder="Entrez à nouveau votre mot de passe" name="password-check" required>
        <input type="submit" id="submit" value="INSCRIPTION">
    </form>
</body>
</html>