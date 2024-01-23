<!-- index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL CHALLENGER</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 60px; /* Ajuster la position en fonction de votre besoin */
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
        }
        .header {
            background-color: #343a40;
            color: #ffffff;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header-title {
            font-size: 1.8rem;
            font-weight: bold;
        }
        .header-links a {
            text-decoration: none;
            color: #ffffff;
            margin-left: 20px;
        }
        .menu {
            background-color: #007bff;
            color: #ffffff;
            padding: 10px;
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }
        .menu a {
            text-decoration: none;
            color: #ffffff;
            font-weight: bold;
        }
        .list-group-item {
            background-color: #ffffff;
            margin-bottom: 10px;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 10px;
        }
        .btn {
            margin-top: 20px;
        }
        .main-content {
            text-align: center;
        }
    </style>
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
