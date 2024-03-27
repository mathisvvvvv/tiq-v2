<?php

session_start();
include('header.php');

// Inclure le fichier de connexion à la base de données si nécessaire
// include('connexion_bdd.php');

// Exemple de connexion à la base de données avec MySQLi
$bdd = new SQLite3('database.sqlite');

// Requête pour sélectionner toutes les questions et réponses
$sql = "SELECT * FROM questions";

// Exécuter la requête
$resultat = $bdd->query($sql);

$questions = array();

// Boucler sur les résultats et les stocker dans le tableau
while ($row = $resultat->fetchArray(SQLITE3_ASSOC)) {
    $questions[] = $row;
}

// Fermer la connexion
$bdd->close();
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Style pour le bouton rouge */
        .btn-delete {
            background-color: #ff0000; /* Rouge */
            color: #fff; /* Texte blanc */
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-edit {
            background-color: #0000FF; /* Blue */
            color: #fff; /* Texte blanc */
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
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



    <!-- Affichage des questions et réponses -->
    <div class="container mt-5">
        <h1>Toutes les questions et réponses</h1>
        <ul class="list-group">
            <?php foreach ($questions as $question): ?>
                <li class="list-group-item">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-1"><?php echo $question['question']; ?></h5>
                            <p class="mb-1"><?php echo $question['reponse']; ?></p>
                            <p class="mb-1"><?php echo $question['level']; ?></p>
                        </div>
                        <div>
                            <!-- Bouton de modification -->
                            <form action="modifier_questions.php" method="post" style="display: inline;">
                                <input type="hidden" name="id" value="<?php echo $question['id']; ?>">
                                <button type="submit" class="btn-edit">Modifier</button>
                            </form>
                            <!-- Bouton de suppression -->
                            <form action="suppr_questions.php" method="post" style="display: inline;">
                                <input type="hidden" name="id" value="<?php echo $question['id']; ?>">
                                <button type="submit" class="btn-delete"><i class="fas fa-trash-alt"></i></button>
                
                            </form>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>


<!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
