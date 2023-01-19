<!-- Ici le contenu de la page form edition (on récupère les données) : -->
<?php
// On vérifie qu'il y a des données qui arrivent, que les champs sont remplis et pas vides, c'est notre UPDATE :
if ($_POST) {
    if (
        isset($_POST['id']) && !empty($_POST['id'])
        && isset($_POST['image']) && !empty($_POST['image'])
        && isset($_POST['title']) && !empty($_POST['title'])
        && isset($_POST['category_id']) && !empty($_POST['category_id'])
        && isset($_POST['persons']) && !empty($_POST['persons'])
        && isset($_POST['time']) && !empty($_POST['time'])
        && isset($_POST['ingredients']) && !empty($_POST['ingredients'])
        && isset($_POST['recipe']) && !empty($_POST['recipe'])
    ) {
        // On inclut la connexion à la base :
        require_once __DIR__ . '/../../../globalComponents/sql.php';

        // On nettoie les données envoyées :
        $id = strip_tags($_POST["id"]);
        $image = strip_tags($_POST["image"]);
        $title = strip_tags($_POST["title"]);
        $user_id = $_SESSION["user"]["id"];
        $category_id = strip_tags($_POST["category_id"]);;
        $persons = strip_tags($_POST["persons"]);
        $time = strip_tags($_POST["time"]);
        $ingredients = strip_tags($_POST["ingredients"]);
        $recipe = strip_tags($_POST["recipe"]);

        updateRecipe($id, $image, $title, $user_id, $category_id, $persons,$time, $ingredients, $recipe );
?>
        <div class="container mt-3 text-center">

            <h3>Ta recette a été modifiée dans ton espace personnel ! &#127881;</h3>

            <div class="button">
                <a href="/PROJET%20PERSO/personalSpace/personalSpace/personalSpace.php"><button type="button" class="btn btn-primary mt-2">Voir espace personnel</button></a>
            </div>

        </div>

<?php
    }
}

