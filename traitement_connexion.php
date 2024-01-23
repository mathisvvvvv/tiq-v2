<?php
// Connexion à la base de données
$bdd = new SQLite3('database.sqlite');

// Vérification de la connexion
if (!$bdd) {
    die("Erreur de connexion à la base de données");
}

// Récupération des données du formulaire
$username = $_POST['username'];
$password = $_POST['password'];

// Fermeture de la connexion
$bdd->close();

// Redirection vers la page d'accueil ou une page de confirmation
header("Location: index.php");
exit();
