<?php
// Vérifier si l'identifiant de la question est passé en paramètre dans l'URL
if (isset($_GET['id'])) {
    // Récupérer l'identifiant de la question depuis l'URL
    $question_id = $_GET['id'];

    $bdd = new SQLite3('database.sqlite');

    // Préparer et exécuter la requête pour récupérer les informations de la question à modifier
    $sql = $bdd->prepare("SELECT * FROM questions WHERE id = ?");
    $sql->bindValue(1, $question_id, SQLITE3_INTEGER);
    $resultat = $sql->execute();

    // Vérifier si la question existe
    if ($row = $resultat->fetchArray(SQLITE3_ASSOC)) {
        // Récupérer les données de la question
        $question = $row['question'];
        $reponse = $row['reponse'];
        $level = $row['level'];
    } else {
        // Afficher un message d'erreur si la question n'existe pas
        echo "La question spécifiée n'existe pas.";
        exit();
    }

    // Fermer la connexion à la base de données
    $bdd->close();
} else {
    // Afficher un message d'erreur si l'identifiant de la question n'est pas passé en paramètre
    echo "Identifiant de la question non spécifié.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Question</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1>Modifier la Question</h1>
        <form action="sauvegarder_modif.php" method="post">
            <input type="hidden" name="id" value="<?php echo $question_id; ?>">
            <div class="form-group">
                <label for="question">Question :</label>
                <input type="text" class="form-control" name="question" value="<?php echo $question; ?>">
            </div>
            <div class="form-group">
                <label for="reponse">Réponse :</label>
                <input type="text" class="form-control" name="reponse" value="<?php echo $reponse; ?>">
            </div>
            <div class="form-group">
                <label for="level">Niveau :</label>
                <input type="text" class="form-control" name="level" value="<?php echo $level; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>