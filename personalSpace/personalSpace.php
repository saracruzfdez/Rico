<!-- Ici notre page d'entrée Espace personnel-->
<!DOCTYPE html>
<html lang="fr">

<?php require_once __DIR__ . "/../globalComponents/head.php"; ?>

<body>

    <?php
    // Recupere les composants de la page Espace personnel :
    require_once __DIR__ . "/../globalComponents/header.php";
    require_once __DIR__ . "/../globalComponents/config.php";
    require_once __DIR__ . "/components/personalSpaceContent.php";
    require_once __DIR__ . "/../globalComponents/footer.php"
    ?>

</body>

</html>