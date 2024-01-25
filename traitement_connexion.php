<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Vérifier les informations dans la base de données
    $bdd = new SQLite3('database.sqlite');
    $stmt = $bdd->prepare('SELECT id, password, username FROM utilisateurs WHERE username = :username');
    $stmt->bindParam(':username', $username);
    $result = $stmt->execute();
    
    // Vérifier le mot de passe haché
    if ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        if (password_verify($password, $row['password'])) {
            // L'utilisateur est connecté avec succès
            $_SESSION['uutilisateur_id'] = $row['id'];
            $bdd->close();

            // Rediriger vers la page de connexion avec le message
            header("Location: connexion.php?success=1");
            exit();
        }
    }

    // Si les informations sont incorrectes, afficher un message d'erreur
    $error_message = "Identifiant ou mot de passe incorrect.";
    $bdd->close();

    // Rediriger vers la page de connexion avec le message d'erreur
    header("Location: connexion.php?error=$error_message");
    exit();
}
?>
