<!DOCTYPE html>
<html>
<head>
    <title>Traitement du Paiement</title>
    <!-- Ajouter les liens vers les fichiers CSS de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <?php
    if (isset($_POST["uid"])) {
        $uid = $_POST["uid"];

        // Vérification de la méthode de paiement sélectionnée
        if (isset($_POST["methode_paiement"]) && ($_POST["methode_paiement"] === "e_dnar" || $_POST["methode_paiement"] === "carte_bancaire" || $_POST["methode_paiement"] === "autre")) {
            // Récupération du numéro de validation
            $numero_validation = $_POST["numero_validation"];

            // Vérification du numéro de validation
            if (strlen($numero_validation) === 8 && ctype_digit($numero_validation)) {
                // Traitement du paiement et mise à jour de la commande

                // Affichage du message de confirmation avec une alerte Bootstrap de type "success"
                echo '<div class="alert alert-success" role="alert">';
                echo '<h1>Paiement Effectué</h1>';
                echo '<p>Votre paiement a été traité avec succès.</p>';
                echo '</div>';
            } else {
                // Affichage d'un message d'erreur si le numéro de validation est incorrect avec une alerte Bootstrap de type "danger"
                echo '<div class="alert alert-danger" role="alert">';
                echo '<h1>Erreur de Paiement</h1>';
                echo '<p>Le numéro de validation est invalide.</p>';
                echo '</div>';
            }
        } else {
            // Affichage d'un message d'erreur si aucune méthode de paiement valide n'est sélectionnée avec une alerte Bootstrap de type "warning"
            echo '<div class="alert alert-warning" role="alert">';
            echo '<h1>Erreur de Paiement</h1>';
            echo '<p>Veuillez sélectionner une méthode de paiement valide.</p>';
            echo '</div>';
        }
    }
    ?>
    <!-- Ajouter les scripts JavaScript de Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
