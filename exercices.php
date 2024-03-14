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

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer la réponse soumise par le formulaire
    $reponseSoumise = $_POST['reponse'] ?? '';

    // Récupérer la réponse correcte de la base de données
    $questionIndex = $_SESSION['question_index'];

    // Vérifier si la clé existe dans le tableau
    if (isset($_SESSION['questions'][$questionIndex])) {
        $currentQuestion = $_SESSION['questions'][$questionIndex];

        echo '<!DOCTYPE html>';
        echo '<html lang="en">';
        echo '<head>';
        echo '<meta charset="UTF-8">';
        echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
        echo '<title>Résultat de la vérification</title>';
        echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">';
        echo '</head>';
        echo '<body class="bg-light">';
        echo '<div class="container mt-5">';
        if ($reponseSoumise == $currentQuestion['reponse']) {
            echo '<h1 class="text-center text-success mb-4">Bravo ! La réponse est correcte.</h1>';
        } else {
            echo '<h1 class="text-center text-danger mb-4">Désolé, la réponse est incorrecte.</h1>';
        }
        echo '<a href="exercices.php" class="btn btn-secondary mt-3">Revenir à l\'exercice</a>';
        echo '</div>';
        echo '</body>';
        echo '</html>';
        exit; // Arrêter l'exécution du reste du code après l'affichage du résultat
    }
}

// Afficher la question actuelle
$questionIndex = $_SESSION['question_index'];
if (isset($_SESSION['questions'][$questionIndex])) {
    $currentQuestion = $_SESSION['questions'][$questionIndex];
} else {
    // Si la question n'existe pas, rediriger vers la page d'accueil
    header("Location: index.php");
    exit;
}

// Fermeture de la connexion
$bdd->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL CHALLENGER</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/header_menu.css">
    <style>
        .center-title {
            text-align: center;
        }
    </style>
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
        <h1 class="text-center text-info mb-4">Apprendre SQL - Questions et Réponses</h1>

        <?php
        // Afficher la question actuelle
        echo '<h2>Question en cours:</h2>';
        echo '<p><strong>Question:</strong> ' . $currentQuestion['question'] . '</p>';
        ?>

        <form action="exercices.php" method="post">
            <div class="form-group">
                <label for="reponse">Votre réponse :</label>
                <input type="text" class="form-control" id="reponse" name="reponse" required>
            </div>
            <input type="hidden" name="question_index" value="<?php echo $questionIndex; ?>">
            <button type="submit" class="btn btn-primary">Vérifier la réponse</button>
        </form>

        <a href="index.php" class="btn btn-secondary mt-3">Retour à la page d'accueil</a>

        <?php
        // Bouton "Question suivante"
        $nextQuestionIndex = $questionIndex + 1;
        if (isset($_SESSION['questions'][$nextQuestionIndex])) {
            echo '<a href="exercices.php" class="btn btn-success mt-3">Question suivante</a>';
        }
        ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
