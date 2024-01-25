<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum - SQL CHALLENGER</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="header_menu.css">
    <link rel="stylesheet" href="forum.css">
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
        <a href="cour.php">Cours</a>
        <a href="exercices.php">Exercices</a>
        <a href="forum.php">Forum</a>
    </div>


    <div class="container">
        <!-- Forum Content -->
        <a href="#" class="btn btn-primary">Créer un nouveau sujet</a>
        <div class="forum-content">
            <!-- Category 1 -->
            <div class="category-card">
                <h2 class="category-title">Catégorie 1 - Base SQL</h2>
                <ul class="topic-list">
                    <li class="topic-item">
                        <div class="topic-title">SELECT</div>
                        <div class="topic-details">Je ne comprend pas l'utilisation du SELECT </div>
                        <div class="topic-details">Posted by User1 - 3 hours ago</div>
                    </li>
                    <li class="topic-item">
                        <div class="topic-title">SELECT *</div>
                        <div class="topic-details">A quoi sert le * ? récupère t'il toute les informations </div>
                        <div class="topic-details">Posted by User2 - 1 day ago</div>
                    </li>
                </ul>
                <a href="#" class="btn btn-secondary">Répondre</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>