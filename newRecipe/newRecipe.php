<!-- Ici notre page d'entrée Nouvelle recette-->
<!DOCTYPE html>
<html lang="fr">

<?php require_once __DIR__ . "/../globalComponents/head.php"; ?>

<body>

    <?php
    // Recupere les composants de la page Nouvelle recette :
    require_once __DIR__ . "/../globalComponents/header.php";
    require_once __DIR__ . "/../globalComponents/config.php";
    require_once __DIR__ . "/components/newRecipeContent.php";
    require_once __DIR__ . "/../globalComponents/footer.php"
    ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>

</html>