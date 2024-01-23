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

// Ajout des données à la base de données
$query = "INSERT INTO utilisateurs (nom, prenom, email, password, adresse) VALUES (:nom, :prenom, :email, :password, :adresse)";
$statement = $bdd->prepare($query);
$statement->bindValue(':nom', $nom, SQLITE3_TEXT);
$statement->bindValue(':prenom', $prenom, SQLITE3_TEXT);
$statement->bindValue(':adresse', $adresse, SQLITE3_TEXT);
$statement->bindValue(':email', $email, SQLITE3_TEXT);
$statement->bindValue(':password', $password, SQLITE3_TEXT);

$statement->execute();

// Fermeture de la connexion
$bdd->close();

// Redirection vers la page d'accueil ou une page de confirmation
header("Location: index.php");
exit();
