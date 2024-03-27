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
    <link rel="stylesheet" href="style/cour.css">
    <style>
        .center-title {
            text-align: center;
        }
    </style>
</head>

<body>
    <!-- En-tête -->
    <div class="header">
        <div class="logo">
            <img src="img/logo.png" alt="Logo SQL CHALLENGER">
        </div>
        <div class="header-title text-center">
            <a href="index.php" style="text-decoration: none; color: inherit;">SQL CHALLENGER</a>
        </div>
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

    <!-- Menu horizontal -->
    <div class="menu">
        <a href="cours.php">Cours</a>
        <a href="exercices.php">Exercices</a>
        <a href="forum.php">Forum</a>
    </div>

    
    <div class="container-fluid">
        <div class="row">
            <!-- Menu latéral -->
            <div class="col-md-2 sidebar">
                <h3 style="color: white">Catégories</h3>
                <ul>
                    <li><a href="#" onclick="changeContent('SELECT Basique')">SELECT Basique</a></li>
                    <li><a href="#" onclick="changeContent('Joins')">Joins</a></li>
                    <li><a href="#" onclick="changeContent('Aggregations')">Aggregations</a></li>
                </ul>
            </div>

            <!-- Contenu principal -->
            <div class="col-md-10 main-content" id="content">
                <!-- Contenu initial -->
                <p>Sélectionnez une catégorie pour afficher le contenu correspondant.</p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function changeContent(category) {
            // Récupérer l'élément avec l'ID "content"
            var contentElement = document.getElementById('content');

            // Modifier le contenu en fonction de la catégorie
            switch (category) {
                case 'SELECT Basique':
                    contentElement.innerHTML = '<h1>SELECT Basique</h1><p>Contenu pour SELECT Basique...</p>';
                    break;
                case 'Joins':
                    contentElement.innerHTML = '<h1>Joins</h1><p>Contenu pour Joins...</p>';
                    break;
                case 'Aggregations':
                    contentElement.innerHTML = '<h1>Aggregations</h1><p>Contenu pour Aggregations...</p>';
                    break;
                default:
                    contentElement.innerHTML = '<p>Sélectionnez une catégorie pour afficher le contenu correspondant.</p>';
            }
        }
    </script>
</body>

</html>
