<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <h1 class="col-6">Inscription</h1>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <h3>Information</h1>
        <form action="traitement_inscription.php" method="post">
            <label for="nom">Nom :</label>
            <input type="text" name="nom" required><br>
            <label for="prenom">Prénom :</label>
            <input type="text" name="prenom" required><br>
            <label for="adresse">Adresse :</label>
            <input type="text" name="adresse" required><br>
            <label for="email">Mail :</label>
            <input type="text" name="email" required><br>
            <label for="password">Mot de passe :</label>
            <input type="text" name="password" required><br>
            
            <input class="btn btn-warning mb-3 mt-3" type="submit" value="S'inscrire">
            <input class="btn btn-danger" type="submit" value="Annuler">
        </form>
        <a href="index.php">Retour à la page d'accueil</a>
</body>

</html>