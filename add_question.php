<?php
session_start();
include('header.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL CHALLENGER</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/header_menu.css">
    <style>
        .center-title {
            text-align: center;
        }
    </style>
</head>

<body>
    
<div class="header">
        <div class="logo">
            <img src="img/logo.png" alt="Logo SQL CHALLENGER">
        </div>
        <div class="header-title text-center">SQL CHALLENGER</div>
        <div class="header-links">
            <?php
            // Affichez les liens de connexion/inscription ou de données du compte/déconnexion en fonction de la connexion de l'utilisateur
            if (isset($_SESSION['username'])) {

                // Affichez la photo de profil si le chemin est disponible
                if (!empty($userData['photo_path'])) {
                    echo '<img src="' . $userData['photo_path'] . '" alt="Photo de profil" class="profile-photo">';
                }
                echo '<a href="account.php">' . $username . '</a>';
                if ($userData['admin']) {
                    echo '<a href="back_office.php">Admin</a>';
                }
                echo '<a href="logout.php">Déconnexion</a>';
            } else {
                echo '<a href="connexion.php">Connexion</a>';
                echo '<a href="inscription.php">Inscription</a>';
            }
            ?>
        </div>
    </div>

    <body>
        <h1>Ajouter une question</h1>
        <form action="traitement_question.php" method="post">
            <label for="question">Question :</label>
            <input type="text" name="question" required><br>
            <label for="reponse">Réponse :</label>
            <input type="text" name="reponse" required><br>
            <label for="level">Niveau (1 à 5) :</label>
            <input type="text" name="level" required><br>
            <input type="submit" value="Ajouter">

        </form>
        <a href="index.php">Retour à la page d'accueil</a>
    </body>

</html>