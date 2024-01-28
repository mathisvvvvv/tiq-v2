<!-- index.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL CHALLENGER</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/header_menu.css">
</head>

<body>
    <!-- En-tête -->
    <div class="header">
        <div class="header-title">SQL CHALLENGER</div>
        <div class="logo">
            <img src="img/logo_test.png" alt="Logo SQL CHALLENGER">
        </div>
        <div class="header-links">
            <a href="connexion.php">Connexion</a>
            <a href="inscription.php">Inscription</a>
        </div>
    </div>

    <!-- Menu horizontal -->
    <div class="menu">
        <a href="cours.php">Cours</a>
        <a href="exercices.php">Exercices</a>
        <a href="forum.php">Forum</a>
    </div>

    <div class="container mt-3">
        <!-- Main Content -->
        <div class="main-content">
            <h1 class="text-info mb-4">Apprendre SQL - Questions et Réponses</h1>
            <ul class="list-group">
                <?php
                // Connexion à la base de données
                $bdd = new SQLite3('database.sqlite');

                // Vérification de la connexion
                if (!$bdd) {
                    die("Erreur de connexion à la base de données");
                }

                // Récupération des questions depuis la base de données
                $resultat = $bdd->query('SELECT * FROM questions');

                // Affichage des questions et réponses
                while ($row = $resultat->fetchArray(SQLITE3_ASSOC)) {
                    echo '<li class="list-group-item"><strong>Question:</strong> ' . $row['question'] . ' - <strong>Réponse:</strong> ' . $row['reponse'] . '</li>';
                }

                // Fermeture de la connexion
                $bdd->close();
                ?>
            </ul>
            <a href="add_question.php" class="btn btn-success mt-3">Ajouter une question</a>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>