<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="style/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/header_menu.css">
</head>

<body>
    <!-- En-tête -->
    <div class="header">
        <div class="logo">
            <img src="img/logo.png" alt="Logo SQL CHALLENGER">
        </div>
        <div class="header-title text-center">SQL CHALLENGER</div>
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
        <h1 class="text-center">Inscription</h1>

        <div class="col-md-6 offset-md-3">
            <form action="traitement_inscription.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="photo">Choisissez une photo :</label>
                    <input type="file" name="photo" id="photo" accept="image/*" onchange="previewImage(this)" class="form-control-file photo-profil">
                    <div class="photo-preview-container">
                        <img id="preview" src="#" alt="Aperçu de la photo" class="photo-profil-preview">
                    </div>
                </div>

                <div class="form-group">
                    <label for="nom">Nom :</label>
                    <input type="text" name="nom" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="prenom">Prénom :</label>
                    <input type="text" name="prenom" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="adresse">Adresse :</label>
                    <input type="text" name="adresse" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Mail :</label>
                    <input type="text" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="username">Pseudo :</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe :</label>
                    <input type="password" id="passwordInput" name="password" class="form-control" required>
                </div>
                <!-- Ajoutez les autres champs ici avec leurs div.form-group correspondantes -->

                <a class="btn btn-danger mb-3 mt-3 mr-3" href="index.php">Annuler</a>
                <button class="btn btn-warning mb-3 mt-3 ml-3" type="submit">S'inscrire</button>
            </form>
            <a href="index.php" class="mt-3 d-block text-center">Retour à la page d'accueil</a>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Ajoutez ici votre script JavaScript pour l'aperçu de l'image -->
    <script>
        function previewImage(input) {
            var preview = document.getElementById('preview');
            var file = input.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };

            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>
</body>

</html>