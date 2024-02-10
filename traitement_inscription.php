<?php
// Connexion à la base de données
$bdd = new SQLite3('database.sqlite');

// Vérification de la connexion
if (!$bdd) {
    die("Erreur de connexion à la base de données");
}

// Récupération des données du formulaire
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$password = $_POST['password'];
$adresse = $_POST['adresse'];
$username = $_POST['username'];

// Hacher le mot de passe
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifier si le champ de fichier 'photo' a été soumis
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        // Récupération du fichier photo
        $photo = $_FILES['photo'];

        // Chemin de destination
        $uploadPath = 'img/users/';
        $destination = $uploadPath . $photo['name'];

        // Déplacer le fichier vers le répertoire de destination
        move_uploaded_file($photo['tmp_name'], $destination);

        // Définir le chemin du fichier dans la variable $filePath
        $filePath = $destination;
    } else {
        // Utiliser le chemin de la photo par défaut si aucun fichier n'est soumis
        $filePath = 'img/profil-defaut.jpg';
    }

    // Ajout des données à la base de données
    $query = "INSERT INTO utilisateurs (nom, prenom, email, password, adresse, username, photo_path) VALUES (:nom, :prenom, :email, :password, :adresse, :username, :photo_path)";
    $statement = $bdd->prepare($query);
    $statement->bindValue(':nom', $nom, SQLITE3_TEXT);
    $statement->bindValue(':prenom', $prenom, SQLITE3_TEXT);
    $statement->bindValue(':adresse', $adresse, SQLITE3_TEXT);
    $statement->bindValue(':email', $email, SQLITE3_TEXT);
    $statement->bindValue(':password', $hashedPassword, SQLITE3_TEXT); // Utiliser le mot de passe haché
    $statement->bindValue(':username', $username, SQLITE3_TEXT);
    $statement->bindValue(':photo_path', $filePath, SQLITE3_TEXT);

    $statement->execute();

    // Fermeture de la connexion
    $bdd->close();

    // Redirection vers la page d'accueil ou une page de confirmation
    header("Location: connexion.php");
    exit();
} else {
    // Afficher un message d'erreur si le champ 'photo' n'est pas correctement soumis
    echo 'Erreur lors de l\'inscription. Veuillez choisir une photo.';
}
?>
