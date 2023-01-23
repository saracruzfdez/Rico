<!-- Contenu de la page d'accueil recettes, affiche un message de bienvenue, et "READ" la totalité des recettes stockées dans notre bd -->
<?php
// On inclut la connexion à la base :
require_once __DIR__ . '/../../../globalComponents/sql.php';

// On stocke le résultat dans un tableau (je récupère tout le contenu du tableau avec fetchAll()),
$recipes = selectRecipes();

// On stocke le résultat dans un tableau (je récupère tout le contenu du tableau avec fetchAll()),
$name = selectUsers();

// On stocke le résultat dans un tableau (je récupère tout le contenu du tableau avec fetchAll()),
$categories = selectCategories();

?>

<!-- Ici on boucle sur $recipes pour donner la forme card à chaque recette de notre base de données -->
<div class="container mt-3">

    <h3>Bienvenue à Rico !</h3>

    <p>Connectez-vous pour rajouter des recettes à vos favoris et créer les votres dans votre espace personnel &#128521;</p>

    <!-- Ici on boucle sur ????? -->
    <div class="d-flex flex-row flex-wrap justify-content-center">

        <?php foreach ($categories as $category) : ?>

            <?php require __DIR__ . "/categorie.php" ?>

        <?php endforeach; ?>

    </div>



    <div class="d-flex flex-row flex-wrap">

        <?php foreach ($recipes as $recipe) : ?>

            <?php require __DIR__ . "/indexCardRecipe.php" ?>

        <?php endforeach; ?>

    </div>

</div>