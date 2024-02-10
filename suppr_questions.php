<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si l'identifiant de la question est présent dans la requête
    if (isset($_POST['id'])) {
        // Récupérer l'identifiant de la question depuis la requête
        $id = $_POST['id'];

        // Connexion à la base de données
        $bdd = new SQLite3('database.sqlite');

        // Préparer la requête SQL pour supprimer la question de la base de données
        $sql = "DELETE FROM questions WHERE id = :id";

        // Préparer la déclaration
        $stmt = $bdd->prepare($sql);

        // Lier les paramètres avec les valeurs
        $stmt->bindValue(':id', $id, SQLITE3_INTEGER);

        // Exécuter la requête
        $resultat = $stmt->execute();

        // Vérifier si la suppression a réussi
        if ($resultat) {
            echo "Question supprimée avec succès.";
        } else {
            echo "Erreur lors de la suppression de la question.";
        }

        // Fermer la connexion à la base de données
        $bdd->close();
    } else {
        echo "Identifiant de la question non trouvé.";
    }
} else {
    echo "Accès non autorisé à ce script.";
}
?>