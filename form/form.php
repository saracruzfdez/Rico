<!-- Ici notre troisième page d'entrée FORM. Ici on récupère et contrôle les données-->
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
    // Recupere les composants de la page form :
    require_once __DIR__ . "/../globalComponents/header.php";

    // On vérifie que j'ai des données qui arrivent, que les champs sont remplis et pas vides :
    if ($_POST) {
        if (
            isset($_POST['image']) && !empty($_POST['image'])
            && isset($_POST['title']) && !empty($_POST['title'])
            && isset($_POST['persons'])  && !empty($_POST['persons'])
            && isset($_POST['time'])  && !empty($_POST['time'])
            && isset($_POST['ingredients'])  && !empty($_POST['ingredients'])
            && isset($_POST['recipe'])  && !empty($_POST['recipe'])
        ) {
            // On inclut la connexion à la base :
            require_once __DIR__ . '/../globalComponents/dbConnection/dbConnect.php';

            // On nettoie les données envoyées :
            $image = strip_tags($_POST["image"]);
            $title = strip_tags($_POST["title"]);

            $persons = strip_tags($_POST["persons"]);
            $time = strip_tags($_POST["time"]);
            $ingredients = strip_tags($_POST["ingredients"]);
            $recipe = strip_tags($_POST["recipe"]);

            $sql = "INSERT INTO `recipes` (`id`, `image`, `title`, `user_id`, `persons`, `time`, `ingredients`, `recipe`) VALUES (:id, :image, :title, :user_id, :persons, :time, :ingredients, :recipe);";

            $query = $db->prepare($sql);

            $query->bindValue('$id', $id, PDO::PARAM_STR);
            $query->bindValue('$image', $image, PDO::PARAM_STR);
            $query->bindValue('$title', $title, PDO::PARAM_STR);
            $query->bindValue('$user_id', $user_id, PDO::PARAM_STR);
            $query->bindValue('$persons', $persons, PDO::PARAM_INT);
            $query->bindValue('$time', $time, PDO::PARAM_INT);
            $query->bindValue('$ingredients', $ingredients, PDO::PARAM_STR);
            $query->bindValue('$recipe', $recipe, PDO::PARAM_STR);

            $query->execute();

            // On inclut la déconnexion à la base :
            require_once  __DIR__ . "/../globalComponents/dbConnection/dbClose.php";

            // On redirige à la page recettes :
            header('Location: /PROJET%20PERSO/recipes/index.php');
        } else {
    ?>
            <div class="container mt-3">

                <div class="button">
                    <p>Le formulaire est incomplet :(</p>
                    <a href="/PROJET%20PERSO/newRecipe/newRecipe.php"><button type="button" class="btn btn-primary">Retour au formulaire</button></a>
                </div>

            </div>
    <?php
        }
    }

    // Recupere le footer :
    require_once __DIR__ . "/../globalComponents/footer.php"
    ?>

</body>

</html>