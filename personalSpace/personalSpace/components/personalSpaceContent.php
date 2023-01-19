<!-- Ici le contenu de l'espace personnel, permets de créer des recettes et d'afficher la totalité des recettes stockées dans notre bd de l'user logé actuellement : -->
<?php
// On inclut la connexion à la base :
require_once __DIR__ . '/../../../globalComponents/sql.php';
require_once __DIR__ . '/../../../globalComponents/utils.php';

$activeUserId  = getActiveUserId();

// On stocke le résultat dans un tableau (je récupère tout le contenu du tableau avec fetchAll()),
$recipes = selectRecipesByUserId($_SESSION['user']['id']);

// On stocke le résultat dans un tableau (je récupère tout le contenu du tableau avec fetchAll()),
$recipesStarter = selectRecipesByCategoryIdAndUserId(1, $activeUserId);

// On stocke le résultat dans un tableau (je récupère tout le contenu du tableau avec fetchAll()),
$recipesMain  = selectRecipesByCategoryIdAndUserId(2, $activeUserId);

// On stocke le résultat dans un tableau (je récupère tout le contenu du tableau avec fetchAll()),
$recipesDessert = selectRecipesByCategoryIdAndUserId(3, $activeUserId);

// On stocke le résultat dans un tableau (je récupère tout le contenu du tableau avec fetchAll()),
$recipesDrink = selectRecipesByCategoryIdAndUserId(4, $activeUserId);

$users = selectUsers();
?>


<div class="container mt-3">

    <h3>Espace personnel</h3>

    <div class="button text-center mt-3">
        <a href="/PROJET%20PERSO/personalSpace/personalSpaceRecipeCreate/personalSpaceRecipeCreate.php"><button type="button" class="btn btn-primary">Creer une recette</button></a>
    </div>


    <!-- Ici on boucle sur $recipes pour donner la forme card à chaque recette de notre base de données -->


    <!-- -->
    <?php if (isset($_SESSION["user"])) {

        if (isset($recipes) && !empty($recipes)) { ?>

            <p>Salut <?php echo ($_SESSION["user"]["name"]) ?>, vos recettes ont l'air &#129316;
                Vous avez
                <?php echo (count($recipesStarter));
                if (count($recipesStarter) <= 1) { ?> entrée, <?php } else { ?> entrées, <?php };
                                                                                                                            echo (count($recipesMain));
                                                                                                                            if (count($recipesMain) <= 1) { ?> plat, <?php } else { ?> plats, <?php };
                                                                                                                            echo (count($recipesDessert));
                                                                                                                            if (count($recipesDessert) <= 1) { ?> dessert et <?php } else { ?> desserts et <?php };
                                                                                                                            echo (count($recipesDrink));
                                                                                                                            if (count($recipesDrink) <= 1) { ?> boisson. <?php } else { ?> boissons. <?php };


                                                                                                                            $recipePerCategories = [
                                                                                                                                "Drink" => count($recipesDrink),
                                                                                                                                "Starter" => count($recipesStarter),
                                                                                                                                "Dessert" => count($recipesDessert),
                                                                                                                                "Main" => count($recipesMain),
                                                                                                                            ];

                                                                                                                            arsort($recipePerCategories);

                                                                                                                            $mostUsedCategory = array_key_first($recipePerCategories);


                                                                                                                            // var_dump($mostUsedCategory);

                                                                                                                            switch ($mostUsedCategory) {
                                                                                                                                case "Drink":
                                                                                                                                    $message = "Vous avez beaucoup soif !";
                                                                                                                                    break;
                                                                                                                                case "Starter":
                                                                                                                                    $message = "Vous adorez bien débuter !";
                                                                                                                                    break;
                                                                                                                                case "Dessert":
                                                                                                                                    $message = "Vous aimez les gourmandises !";
                                                                                                                                    break;
                                                                                                                                case "Main":
                                                                                                                                    $message = "Vous aimez les plats forts !";
                                                                                                                                    break;
                                                                                                                            }


                                                                                                                            echo $message;
                                                                                                                        } else { ?>
            <p>Salut <?php echo ($_SESSION["user"]["name"]) ?>, envie de rajouter quelques recettes ? &#129316;</p>
    <?php

                                                                                                                        }
                                                                                                                    }

    ?>


    <div class="d-flex flex-row flex-wrap align-content-center">


        <?php foreach ($recipes as $recipe) : ?>

            <?php require __DIR__ . "/personalSpaceCardRecipe.php" ?>

        <?php endforeach; ?>
    </div>
</div>