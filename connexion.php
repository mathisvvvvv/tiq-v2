<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/header_menu.css">
</head>

<body>
    <!-- En-tête -->
    <div class="header">
        <div class="header-title">SQL CHALLENGER</div>
        <div class="header-links">
            <a href="connexion.php">Connexion</a>
            <a href="inscription.php">Inscription</a>
        </div>
    </div>

    <!-- Menu horizontal -->
    <div class="menu">
        <a href="cour.php">Cours</a>
        <a href="exercices.php">Exercices</a>
        <a href="forum.php">Forum</a>
    </div>

    <div class="container">
        <h3>Identification</h3>

        <?php
        // Ajoutez cette section pour afficher les messages
        if (isset($_GET['success']) && $_GET['success'] == 1) {
            echo '<div class="alert alert-success" role="alert">Vous êtes connecté avec succès !</div>';
        } elseif (isset($_GET['error'])) {
            $error_message = htmlspecialchars($_GET['error']);
            echo '<div class="alert alert-danger" role="alert">' . $error_message . '</div>';
        }
        ?>

        <form action="traitement_connexion.php" method="post">
            <div class="form-group">
                <label for="username">Nom d'utilisateur :</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe :</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="d-flex justify-content-between">
                <a class="btn btn-danger btn-block mb-2 mt-2 mr-5" href="index.php">Annuler</a>
                <input class="btn btn-success btn-block mb-2 mt-2 ml-5" type="submit" value="Connexion">
            </div>
        </form>
        <a class="mt-4" href="index.php">Retour à la page d'accueil</a>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
