<?php
session_start();
include('header.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/header_menu.css">
    <title>Bannière avec navigation</title>
    <style>
        .banner {
            position: relative;
            width: 100%;
            height: 220px;
            /* Ajustez la hauteur de la bannière selon vos besoins */
            overflow: hidden;
        }

        .banner img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            /* Les images s'adapteront automatiquement à la hauteur de la bannière */
            display: block;
            /* Pour s'assurer que l'image prend toute la largeur */
            margin: 0 auto;
            /* Pour centrer l'image horizontalement */
        }

        .prev,
        .next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            font-size: 18px;
            padding: 10px;
            cursor: pointer;
        }

        .prev {
            left: 10px;
        }

        .next {
            right: 10px;
        }
    </style>
</head>

<body>

    <div class="header">
        <div class="logo">
            <img src="img/logo.png" alt="Logo SQL CHALLENGER">
        </div>
        <div class="header-title">
            <a href="index.php" style="text-decoration: none; color: inherit;">SQL CHALLENGER</a>
        </div>

        <div class="header-links">
            <?php
            // Affichez les liens de connexion/inscription ou de données du compte/déconnexion en fonction de la connexion de l'utilisateur
            if (isset($_SESSION['username'])) {

                // Affichez la photo de profil si le chemin est disponible
                if (!empty($userData['photo_path'])) {
                    echo '<img src="' . $userData['photo_path'] . '" alt="Photo de profil" class="profile-photo">';
                }
                echo '<a href="account.php">' . ucfirst($username) . '</a>';

                if ($userData['admin']) {
                    echo '<a href="back_office.php">Admin</a>';
                }
                echo '<a href="logout.php">Déconnexion</a>';
            } else {
                echo '<a href="connexion.php">Connexion</a>';
                echo '<a href="inscription.php">Inscription</a>';
            }
            ?>
        </div>
    </div>

    <!-- Menu horizontal -->
    <div class="menu">
        <a href="cours.php">Cours</a>
        <a href="exercices.php">Exercices</a>
        <a href="forum.php">Forum</a>
    </div>

    <div class="banner">
        <img src="img/banniere1.jpg" alt="Bannière 1">
        <img src="img/banniere2.jpeg" alt="Bannière 2">
        <img src="img/banniere3.png" alt="Bannière 3">
        <div class="prev" onclick="prevSlide()">&#10094;</div>
        <div class="next" onclick="nextSlide()">&#10095;</div>
    </div>

    <script>
        var currentSlide = 0;
        var slides = document.querySelectorAll('.banner img');

        function showSlide() {
            for (var i = 0; i < slides.length; i++) {
                slides[i].style.display = 'none';
            }
            slides[currentSlide].style.display = 'block';
        }

        function prevSlide() {
            currentSlide--;
            if (currentSlide < 0) {
                currentSlide = slides.length - 1;
            }
            showSlide();
        }

        function nextSlide() {
            currentSlide++;
            if (currentSlide >= slides.length) {
                currentSlide = 0;
            }
            showSlide();
        }

        showSlide();
    </script>


    <section class="main-content">
        <div class="container">
            <h2>Bienvenue sur SQL CHALLENGER</h2>
            <p>Découvrez le monde de SQL et améliorez vos compétences en bases de données avec notre plateforme éducative interactive. Que vous soyez débutant ou expert, notre site offre une variété de ressources pour vous aider à apprendre et à pratiquer SQL.</p>
            <div class="row">
                <div class="col-md-6">
                    <h3>Nos Cours</h3>
                    <p>Explorez notre sélection de cours SQL conçus pour vous guider à travers les concepts fondamentaux et avancés de SQL. Apprenez à interroger des bases de données, à manipuler des données et à construire des requêtes SQL efficaces.</p>
                    <a href="cours.php" class="btn btn-primary">Découvrir les cours</a>
                </div>
                <div class="col-md-6">
                    <h3>Exercices Pratiques</h3>
                    <p>Mettez vos connaissances en pratique avec nos exercices interactifs. Testez vos compétences en résolvant des problèmes SQL réels et en obtenant un retour immédiat. Améliorez votre compréhension et votre maîtrise de SQL en pratiquant régulièrement.</p>
                    <a href="exercices.php" class="btn btn-primary">Commencer les exercices</a>
                </div>
            </div>
        </div>
    </section>


    <!-- Barre latérale en bas -->
    <div class="footer-sidebar bg-dark  text-white p-3">
        <h4>Coordonnées de l'entreprise</h4>
        <p>Adresse : Université de Bordeaux</p>
        <p>Téléphone : 06 06 06 06 06</p>
        <p>Email : sqlchallenger@gmail.com</p>
    </div>
</body>

</html>