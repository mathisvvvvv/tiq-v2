<!-- add_question.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une question</title>
    <link rel="stylesheet" href="styles.css">
</head>
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
