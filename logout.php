<?php
// Démarrez la session
session_start();

// Détruisez toutes les données de la session
session_destroy();

// Rediriger vers la page d'accueil avec un message de déconnexion
header('Location: connexion.php?logout=1');
exit();
?>
