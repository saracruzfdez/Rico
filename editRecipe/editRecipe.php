<!-- Ici notre page d'entrée Editer recette-->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/minty/bootstrap.min.css">
    <link rel="stylesheet" href="/PROJET%20PERSO/style.css">
    <title>Rico</title>
</head>

<body>

    <?php
    // Recupere les composants de la page Editer recette :
    require_once __DIR__ . "/../globalComponents/header.php";
    require_once __DIR__ . "/../globalComponents/config.php";
    require_once __DIR__ . "/components/editRecipeContent.php";
    require_once __DIR__ . "/../globalComponents/footer.php"
    ?>

</body>

</html>