<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si les données sont présentes dans la requête
    if (isset($_POST['id']) && isset($_POST['question']) && isset($_POST['reponse']) && isset($_POST['level'])) {
        // Récupérer les données du formulaire
        $id = $_POST['id'];
        $question = $_POST['question'];
        $reponse = $_POST['reponse'];
        $level = $_POST['level'];

        // Connexion à la base de données
        $bdd = new SQLite3('database.sqlite');

        // Préparer la requête SQL pour mettre à jour la question dans la base de données
        $sql = "UPDATE questions SET question = :question, reponse = :reponse, level = :level WHERE id = :id";

        // Préparer la déclaration
        $stmt = $bdd->prepare($sql);

        // Lier les paramètres avec les valeurs
        $stmt->bindValue(':question', $question, SQLITE3_TEXT);
        $stmt->bindValue(':reponse', $reponse, SQLITE3_TEXT);
        $stmt->bindValue(':level', $level, SQLITE3_TEXT);
        $stmt->bindValue(':id', $id, SQLITE3_INTEGER);

        // Exécuter la requête
        $resultat = $stmt->execute();

        // Vérifier si la mise à jour a réussi
        if ($resultat) {
            echo "Modification sauvegardée avec succès.";
        } else {
            echo "Erreur lors de la sauvegarde de la modification.";
        }

        // Fermer la connexion à la base de données
        $bdd->close();
    } else {
        echo "Tous les champs du formulaire sont obligatoires.";
    }
} else {
    echo "Accès non autorisé à ce script.";
}

header("Location: gerer_questions.php");
exit();

?>

