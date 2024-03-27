<!DOCTYPE html>
<html>
<head>
    <title>Résultats des requêtes</title>
</head>
<body>
    <h2>Résultats des requêtes :</h2>
    <?php
    // Récupération des requêtes de l'utilisateur depuis le formulaire
    $sql_queries = $_POST['sql_queries'];

    // Connexion à la base de données SQLite (ouverture du fichier)
    $db = new SQLite3('chemin/vers/votre/base_de_donnees.db');

    // Séparation des requêtes
    $queries_array = explode(";\n", $sql_queries);

    // Exécution et affichage des résultats pour chaque requête
    foreach ($queries_array as $query) {
        // Suppression des espaces inutiles au début et à la fin de la requête
        $query = trim($query);
        if (!empty($query)) {
            echo "<h3>Résultat de la requête :</h3>";
            echo "<p><strong>" . $query . "</strong></p>";
            $result = $db->query($query);
            if ($result) {
                echo "<table border='1'><tr>";
                // Affichage des en-têtes de colonnes
                $row = $result->fetchArray(SQLITE3_ASSOC);
                foreach ($row as $columnName => $value) {
                    echo "<th>" . $columnName . "</th>";
                }
                echo "</tr>";
                // Affichage des données
                while ($row) {
                    echo "<tr>";
                    foreach ($row as $value) {
                        echo "<td>" . $value . "</td>";
                    }
                    echo "</tr>";
                    $row = $result->fetchArray(SQLITE3_ASSOC);
                }
                echo "</table>";
            } else {
                echo "Erreur lors de l'exécution de la requête : " . $db->lastErrorMsg();
            }
            echo "<hr>"; // Ajouter une ligne de séparation entre les résultats des différentes requêtes
        }
    }

    // Fermeture de la base de données (fermeture du fichier)
    $db->close();
    ?>
</body>
</html>
