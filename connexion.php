<?php
// Démarrer la session au début du fichier
session_start();

$bdd = new SQLite3('database.sqlite');

// Exemple de vérification basique (à améliorer)
$authentication_successful = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Traitez le formulaire de connexion ici
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Assurez-vous de sécuriser la requête SQL pour éviter les injections
    // ...

    // Exemple de vérification basique (à améliorer)
    // Utilisez password_verify pour vérifier le mot de passe haché
    $sql = "SELECT * FROM utilisateurs WHERE username = :username";
    
    // Assurez-vous que la connexion à la base de données est réussie
    if ($bdd) {
        $stmt = $bdd->prepare($sql);
        $stmt->bindParam(':username', $username, SQLITE3_TEXT);
        $result = $stmt->execute();

        // Vérifiez si l'authentification est réussie en utilisant password_verify
        if ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            if (password_verify($password, $row['password'])) {
                $authentication_successful = true;
            }
        }
    }
}

// Ajoutez cette section pour afficher les messages
if (isset($_GET['success']) && $_GET['success'] == 1) {
    echo '<div class="alert alert-success" role="alert">Vous êtes connecté avec succès !</div>';
} elseif (isset($_GET['error'])) {
    $error_message = htmlspecialchars($_GET['error']);
    echo '<div class="alert alert-danger" role="alert">' . $error_message . '</div>';
}

// Vérifiez l'authentification ici après avoir affiché les messages
if ($authentication_successful) {
    // Stocker des informations de l'utilisateur dans la session
    $_SESSION['username'] = $username;

    // Rediriger vers l'index avec un message de succès
    header('Location: index.php?success=1');
    exit();
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Rediriger vers la page de connexion avec un message d'erreur
    header('Location: connexion.php?error=Identifiants incorrects');
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/header_menu.css">
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
        <a href="cours.php">Cours</a>
        <a href="exercices.php">Exercices</a>
        <a href="forum.php">Forum</a>
    </div>

    <div class="container">
        <h3>Identification</h3>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label for="username">Nom d'utilisateur :</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe :</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="d-flex justify-content-between">
                <a class="btn btn-danger btn-block mb-2 mt-2 mr-5" href="index.php">Annuler</a>
                <input class="btn btn-success btn-block mb-2 mt-2 ml-5" type="submit" value="Connexion">
            </div>
        </form>
        <a class="mt-4" href="index.php">Retour à la page d'accueil</a>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
