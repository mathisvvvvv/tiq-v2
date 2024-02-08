<!-- cour.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL CHALLENGER - Cours</title>
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


    <div class="container mt-3">
        <!-- Main Content -->
        <div class="main-content">
            <h1 class=" mb-4">SQL</h1>

            <p>Le SQL (Structured Query Language) est un langage permettant de communiquer avec une base de données. Ce langage informatique est notamment très utilisé par les développeurs web pour communiquer avec les données d’un site web. SQL.sh recense des cours de SQL et des explications sur les principales commandes pour lire, insérer, modifier et supprimer des données dans une base.</p>

            <h2>Cours</h2>
            <p>Les cours ont pour but d’apprendre les principales commandes SQL telles que: SELECT, INSERT INTO, UPDATE, DELETE, DROP TABLE… Chaque commande SQL est présentée par des exemples clairs et concis. Ces tutoriels peuvent vous aider à faire votre propre formation SQL.</p>

            <p>En plus de la liste des commandes SQL, les cours présentent des fiches mnémotechniques présentant les fonctions SQL telles que AVG(), COUNT(), MAX() …</p>

            <h2>Système de gestion de base de données (SGBD)</h2>
            <p>Chaque SGBD possède ses propres spécificités et caractéristiques. Pour présenter ces différences, les logiciels de gestion de bases de données sont cités, tels que : MySQL, PostgreSQL, SQLite, Microsoft SQL Server ou encore Oracle.</p>

            <p>Des SGBD de type NoSQL sont également présentés, tels que Cassandra, Redis ou MongoDB.</p>

            <h2>Optimisation</h2>
            <p>Savoir effectuer des requêtes n’est pas trop difficile, mais il convient de véritablement comprendre comment fonctionne le stockage des données et la façon dont elles sont lues pour optimiser les performances. Les optimisations sont basées dans 2 catégories: les bons choix à faire lorsqu’il faut définir la structure de la base de données et les méthodes les plus adaptées pour lire les données.</p>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>