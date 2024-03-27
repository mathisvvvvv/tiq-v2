<?php
// Démarrer la session
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['username'])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header('Location: connexion.php');
    exit();
}

// Récupérer les informations du compte de l'utilisateur depuis la base de données
$bdd = new SQLite3('database.sqlite');

// Vérification de la connexion
if (!$bdd) {
    die("Erreur de connexion à la base de données");
}

// Utilisez la variable $_SESSION['username'] pour récupérer les informations spécifiques de l'utilisateur depuis la base de données
$username = $_SESSION['username'];
$query = "SELECT * FROM utilisateurs WHERE username = :username";
$stmt = $bdd->prepare($query);
$stmt->bindParam(':username', $username, SQLITE3_TEXT);
$result = $stmt->execute();
$userData = $result->fetchArray(SQLITE3_ASSOC);

// Traitement du formulaire de mise à jour
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newNom = $_POST['new_nom'];
    $newPrenom = $_POST['new_prenom'];
    $newEmail = $_POST['new_email'];
    $newAdresse = $_POST['new_adresse'];

    // Mettre à jour les données de l'utilisateur dans la base de données
    $updateQuery = "UPDATE utilisateurs SET nom = :nom, prenom = :prenom, email = :email, adresse = :adresse WHERE username = :username";
    $updateStmt = $bdd->prepare($updateQuery);
    $updateStmt->bindParam(':nom', $newNom, SQLITE3_TEXT);
    $updateStmt->bindParam(':prenom', $newPrenom, SQLITE3_TEXT);
    $updateStmt->bindParam(':email', $newEmail, SQLITE3_TEXT);
    $updateStmt->bindParam(':adresse', $newAdresse, SQLITE3_TEXT);
    $updateStmt->bindParam(':username', $username, SQLITE3_TEXT);

    // Exécuter la mise à jour
    $updateResult = $updateStmt->execute();

    if ($updateResult) {
        // Mise à jour réussie, rediriger avec un message de succès
        header('Location: mon_compte.php?success=1');
        exit();
    } else {
        // Mise à jour échouée, rediriger avec un message d'erreur
        header('Location: mon_compte.php?error=Erreur lors de la mise à jour');
        exit();
    }
}

// Fermer la connexion
$bdd->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Compte</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/header_menu.css">
</head>

<body>
    <!-- En-tête -->
    <div class="header">
        <div class="logo">
            <img src="img/logo.png" alt="Logo SQL CHALLENGER">
        </div>
        <div class="header-title text-center">
            <a href="index.php" style="text-decoration: none; color: inherit;">SQL CHALLENGER</a>
        </div>
        <div class="header-links">
            <a href="index.php">Accueil</a>
            <a href="logout.php">Déconnexion</a>
        </div>
    </div>

    <div class="container mt-3">
        <!-- Main Content -->
        <div class="main-content">
            <h1 class="text-info mb-4">Mon Compte</h1>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                    <label for="new_nom">Nouveau Nom :</label>
                    <input type="text" name="new_nom" class="form-control" value="<?php echo $userData['nom']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="new_prenom">Nouveau Prénom :</label>
                    <input type="text" name="new_prenom" class="form-control" value="<?php echo $userData['prenom']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="new_email">Nouveau Email :</label>
                    <input type="email" name="new_email" class="form-control" value="<?php echo $userData['email']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="new_adresse">Nouvelle Adresse :</label>
                    <input type="text" name="new_adresse" class="form-control" value="<?php echo $userData['adresse']; ?>" required>
                </div>

                <div class="d-flex justify-content-between">
                    <a class="btn btn-danger btn-block mb-2 mt-2 mr-5" href="index.php">Annuler</a>
                    <input class="btn btn-success btn-block mb-2 mt-2 ml-5" type="submit" value="Enregistrer les modifications">
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>