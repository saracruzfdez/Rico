<!-- Ici le contenu de categorie, permets d'afficher la totalité des recettes stockées dans notre bd de la cat actuelle : -->
<?php
// On inclut la connexion à la base :
require_once __DIR__ . '/../../../globalComponents/sql.php';


// On stocke le résultat dans un tableau (je récupère tout le contenu du tableau avec fetchAll()),
$recipes = selectRecipesByCategoryId($_GET['id']);
$category = selectCategoryById($_GET['id']);
$users = selectUsers();


if (isset($category)) {

?>

    <!-- Ici on boucle sur $recipes pour donner la forme card à chaque recette de notre base de données -->
    <div class="container mt-3">

        <h3><?php echo ($category['name']); ?></h3>

        <div class="container mt-3 nopadding"></div>
        <div class="d-flex flex-row flex-wrap">

            <?php foreach ($recipes as $recipe) : ?>

                <?php require __DIR__ . '/categoriesDetailCardRecipe.php' ?>

            <?php endforeach; ?>

        </div>

    </div>


<?php } else { ?>

    <div class="image-component">

        <div class="text">
            <p>Cette categorie n'existe pas !</p>
        </div>

        <div class="image">
            <img src="https://images.unsplash.com/photo-1561380851-39b27c4f1626?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="">
        </div>

    </div>

<?php } ?>