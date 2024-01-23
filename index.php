<!-- index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apprendre SQL</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center text-info mb-4">Apprendre SQL - Questions et Réponses</h1>
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
        <a href="cour.php" class="btn btn-primary mt-3">Accéder au cours</a>
        <a href="exercices.php" class="btn btn-warning mt-3">Faire des exercices</a>
        <a href="connexion.php" class="btn btn-warning mt-3">Connexion</a>
        <a href="inscription.php" class="btn btn-warning mt-3">Incription</a>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
