<?php
// Connexion à la base de données
$bdd = new SQLite3('database.sqlite');

// Vérification de la connexion
if (!$bdd) {
    die("Erreur de connexion à la base de données");
}

// Récupération des données du formulaire
$question = $_POST['question'];
$reponse = $_POST['reponse'];
$level = $_POST['level'];

// Ajout des données à la base de données
$query = "INSERT INTO questions (question, reponse, level) VALUES (:question, :reponse, :level) ";
$statement = $bdd->prepare($query);
$statement->bindValue(':question', $question, SQLITE3_TEXT);
$statement->bindValue(':reponse', $reponse, SQLITE3_TEXT);
$statement->bindValue(':level', $level, SQLITE3_TEXT);
$statement->execute();

// Fermeture de la connexion
$bdd->close();

// Redirection vers la page d'accueil ou une page de confirmation
header("Location: index.php");
exit();
