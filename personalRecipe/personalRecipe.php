<!-- Ici notre page d'entrée Détail de recette d'un active user -->
<!DOCTYPE html>
<html lang="fr">
    
<?php require_once __DIR__ . "/../globalComponents/head.php"; ?>

<body>

    <?php
    // Recupere les composants de la page Détail de recette personnel :
    require_once __DIR__ . "/../globalComponents/header.php";
    require_once __DIR__ . "/../globalComponents/config.php";
    require_once __DIR__ . "/components/detailPersonalRecipe.php";
    require_once __DIR__ . "/../globalComponents/footer.php"
    ?>

</body>

</html>