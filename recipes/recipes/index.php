<!-- Ici notre page d'entrée Recettes-Accueil -->
<!DOCTYPE html>
<html lang="fr">

<?php
require_once __DIR__ . "/../../globalComponents/head.php"; ?>

<body>

    <?php
    // On recupere les composants de la page Recettes-Accueil :
    require_once __DIR__ . "/../../globalComponents/header.php";
    require_once __DIR__ . "/components/indexImageText.php";
    require_once __DIR__ . "/../../globalComponents/config.php";
    require_once __DIR__ . "/components/indexContent.php";
    require_once __DIR__ . "/../../globalComponents/footer.php"
    ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>