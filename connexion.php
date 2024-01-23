<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <h1>Connexion</h1>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <h3>Identification</h1>
        <form action="traitement_connexion.php" method="post">
            <label for="username">Nom d'utilisateur :</label>
            <input type="text" name="nom" required><br>
            <label for="password">Mot de passe :</label>
            <input type="text" name="password" required><br>

            <input class="btn btn-warning mb-3 mt-3" type="submit" value="Connexion">
            <input class="btn btn-danger" type="submit" value="Annuler">

        </form>
    <a class="mt-6" href="index.php">Retour à la page d'accueil</a>
    

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>