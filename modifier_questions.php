<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si l'identifiant de la question est présent dans la requête
    if (isset($_POST['id'])) {
        // Récupérer l'identifiant de la question depuis la requête
        $id = $_POST['id'];
        
        // Si nécessaire, vous pouvez également récupérer les autres données du formulaire ici
        
        // Rediriger vers une page de modification de la question avec l'identifiant de la question
        header("Location: modifier_question_page.php?id=$id");
        exit();
    } else {
        echo "Identifiant de la question non trouvé.";
    }
} else {
    echo "Accès non autorisé à ce script.";
}
?>
