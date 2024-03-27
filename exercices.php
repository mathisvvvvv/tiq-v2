<?php
session_start();

include('header.php');

// Connexion à la base de données
$bdd = new SQLite3('database.sqlite');
// Vérification de la connexion
if (!$bdd) {
    die("Erreur de connexion à la base de données");
}

// Récupération des questions depuis la base de données
$resultat = $bdd->query('SELECT * FROM questions');

// Stocker les questions dans une variable de session
$_SESSION['questions'] = [];
while ($row = $resultat->fetchArray(SQLITE3_ASSOC)) {
    $_SESSION['questions'][] = $row;
}

// Initialiser le compteur de question dans la session
if (!isset($_SESSION['question_index'])) {
    $_SESSION['question_index'] = 0;
}

// Récupérer le nom de la table à afficher depuis la base de données
$tableName = '';
$questionIndex = $_SESSION['question_index'];
if (isset($_SESSION['questions'][$questionIndex]['bdd'])) {
    $tableName = $_SESSION['questions'][$questionIndex]['bdd'];
}

// Récupérer les données de la table spécifiée
$tableData = [];
if (!empty($tableName)) {
    $tableResult = $bdd->query("SELECT * FROM $tableName");
    while ($row = $tableResult->fetchArray(SQLITE3_ASSOC)) {
        $tableData[] = $row;
    }
}

// Afficher la question actuelle
$currentQuestion = isset($_SESSION['questions'][$questionIndex]) ? $_SESSION['questions'][$questionIndex] : null;

// Fermeture de la connexion
$bdd->close();
?>

<!DOCTYPE html>
<html lang="fr">
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
        <div class="logo">
            <img src="img/logo.png" alt="Logo SQL CHALLENGER">
        </div>
        <div class="header-title text-center">SQL CHALLENGER</div>
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

    <div class="container mt-5">
        <div class="query-form">
            <h1 class="text-center text-info mb-4">Apprendre SQL - Questions et Réponses</h1>

            <?php if ($currentQuestion) : ?>
            <h2>Question en cours:</h2>
            <p><strong>Question:</strong> <?php echo $currentQuestion['question']; ?></p>
        <?php endif; ?>

        <?php if (!empty($tableName) && !empty($tableData)) : ?>
            <h2>Contenu de la table "<?php echo $tableName; ?>" :</h2>
            <table class="table">
                <thead>
                    <tr>
                        <?php foreach ($tableData[0] as $columnName => $value) : ?>
                            <th><?php echo $columnName; ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tableData as $row) : ?>
                        <tr>
                            <?php foreach ($row as $value) : ?>
                                <td><?php echo $value; ?></td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>

            <h2>Entrez votre requête SQL :</h2>
            <form action="exercices.php" method="post">
                <div class="form-group">
                    <textarea name="sql_query" rows="8" cols="50" class="form-control" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Exécuter la requête</button>
            </form>
        </div>

        <div class="query-results">
            <?php
            // Connexion à la base de données SQLite
            $bdd = new SQLite3('database.sqlite');

            // Vérification de la connexion
            if (!$bdd) {
                die("Erreur de connexion à la base de données");
            }

            // Vérifier si le formulaire a été soumis
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Récupérer la requête soumise par l'utilisateur
                $sql_query = $_POST['sql_query'] ?? '';

                // Exécuter la requête SQL
                if (!empty($sql_query)) {
                    $result = $bdd->query($sql_query);

                    // Vérification du résultat de la requête
                    if ($result) {
                        // Affichage des résultats de la requête
                        echo "<h2>Résultats de la requête :</h2>";
                        echo "<table class='table table-bordered'>";
                        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                            echo "<tr>";
                            foreach ($row as $key => $value) {
                                echo "<td>$key</td><td>$value</td>";
                            }
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        // Affichage d'un message d'erreur si la requête a échoué
                        echo "<h2>Erreur lors de l'exécution de la requête :</h2>";
                        echo "<p>" . $bdd->lastErrorMsg() . "</p>";
                    }
                } else {
                    // Afficher un message si aucun requête n'a été soumise
                    echo "<h2>Aucune requête soumise.</h2>";
                }
            }

            // Fermeture de la connexion à la base de données
            $bdd->close();
            ?>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
