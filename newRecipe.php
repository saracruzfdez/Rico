<!-- Ici notre troisième page d'entrée ESPACE PERSO-->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/minty/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Rico</title>
</head>

<body>

    <?php
    // Recupere les composants de la page Nouvelle recette :
    require_once "Component/header.php";
    require_once "Component/newRecipeContent.php";
    ?>

    <?php
    // Recupere le footer :
    require_once "Component/footer.php"
    ?>

</body>

</html>