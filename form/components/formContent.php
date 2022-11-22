<!-- Ici le contenu de la page form (on récupère les données) : -->
<?php

// On vérifie qu'il y a des données qui arrivent, que les champs sont remplis et pas vides :
if ($_POST) {
    if (
        isset($_POST['image']) && !empty($_POST['image'])
        && isset($_POST['title']) && !empty($_POST['title'])
        && isset($_POST['persons']) && !empty($_POST['persons'])
        && isset($_POST['time']) && !empty($_POST['time'])
        && isset($_POST['ingredients']) && !empty($_POST['ingredients'])
        && isset($_POST['recipe']) && !empty($_POST['recipe'])
    ) {
        // On inclut la connexion à la base :
        require_once __DIR__ . '/../../globalComponents/dbConnection/dbConnect.php';

        // On nettoie les données envoyées :
        $image = strip_tags($_POST["image"]);
        $title = strip_tags($_POST["title"]);
        $user_id = $activeUser["id"];
        $persons = strip_tags($_POST["persons"]);
        $time = strip_tags($_POST["time"]);
        $ingredients = strip_tags($_POST["ingredients"]);
        $recipe = strip_tags($_POST["recipe"]);

        $sql = "INSERT INTO `recipes` (`image`, `title`, `user_id`, `persons`, `time`, `ingredients`, `recipe`) VALUES (:image, :title, :user_id, :persons, :time, :ingredients, :recipe);";

        /* marche bien : 
        INSERT INTO `recipes` (`image`, `title`, `user_id`, `persons`, `time`, `ingredients`, `recipe`) VALUES ("sdhfjdgq", "dsfhg", 2, 2, 34, "ghdfifdu", "fhjgdfhgos") */

        $query = $db->prepare($sql);

        $query->bindValue('image', $image, PDO::PARAM_STR);
        $query->bindValue('title', $title, PDO::PARAM_STR);
        $query->bindValue('user_id', $user_id, PDO::PARAM_INT);
        $query->bindValue('persons', $persons, PDO::PARAM_INT);
        $query->bindValue('time', $time, PDO::PARAM_INT);
        $query->bindValue('ingredients', $ingredients, PDO::PARAM_STR);
        $query->bindValue('recipe', $recipe, PDO::PARAM_STR);

        $query->execute();

        // print_r($db->errorInfo());

        // On inclut la déconnexion à la base :
        require_once  __DIR__ . "/../../globalComponents/dbConnection/dbClose.php";
?>
        <div class="container mt-3 text-center">
            <div class="button">
                <p>Ta recette a été rajoutée à ton espace personnel ! &#127881;</p>
                <a href="/PROJET%20PERSO/personalSpace/personalSpace.php"><button type="button" class="btn btn-primary">Voir espace personnel</button></a>
            </div>
        </div>

    <?php
    } else {
        // Si le formulaire est vide ou pas complet on le notifie :
    ?>
        <div class="container mt-3 text-center">

            <div class="button">
                <p>Le formulaire est incomplet &#128532;</p>
                <a href="/PROJET%20PERSO/newRecipe/newRecipe.php"><button type="button" class="btn btn-primary">Retour au formulaire</button></a>
            </div>

        </div>
<?php
    }
}
