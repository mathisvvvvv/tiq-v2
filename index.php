<!-- index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apprendre SQL</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Questions et Réponses SQL</h1>
    <ul>
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
            echo '<li><strong>Question:</strong> ' . $row['question'] . ' - <strong>Réponse:</strong> ' . $row['reponse'] . '</li>';
        }

        // Fermeture de la connexion
        $bdd->close();
        ?>
    </ul>
    <a href="add_question.php">Ajouter une question</a>
</body>
</html>
