<!-- Ici le contenu de l'espace personnel, permets de créer des recettes et d'afficher la totalité des recettes stockées dans notre bd de l'user logé actuellement : -->
<?php
// On inclut la connexion à la base :
require_once __DIR__ . '/../../../globalComponents/dbConnection/dbConnect.php';

$sql = "SELECT * FROM recipes WHERE recipes.user_id = " . $_SESSION['user']['id'];

// On prépare la requête :
$query = $db->prepare($sql);

// On exécute la requête :
$query->execute();

// On stocke le résultat dans un tableau (je récupère tout le contenu du tableau avec fetchAll()),
$recipes = $query->fetchAll(PDO::FETCH_ASSOC);

//
$sql2 = "SELECT * FROM users;";

// var_dump($sql2);

// On prépare la requête :
$query2 = $db->prepare($sql2);

// On exécute la requête :
$query2->execute();

// On stocke le résultat dans un tableau (je récupère tout le contenu du tableau avec fetchAll()),
$name = $query2->fetchAll(PDO::FETCH_ASSOC);




$sql3 = "SELECT * FROM recipes WHERE recipes.category_id = 1 && recipes.user_id = " . $_SESSION['user']['id'];

// On prépare la requête :
$query3 = $db->prepare($sql3);

// On exécute la requête :
$query3->execute();

// On stocke le résultat dans un tableau (je récupère tout le contenu du tableau avec fetchAll()),
$recipesStarter = $query3->fetchAll(PDO::FETCH_ASSOC);



$sql4 = "SELECT * FROM recipes WHERE recipes.category_id = 2 && recipes.user_id = " . $_SESSION['user']['id'];

// On prépare la requête :
$query4 = $db->prepare($sql4);

// On exécute la requête :
$query4->execute();

// On stocke le résultat dans un tableau (je récupère tout le contenu du tableau avec fetchAll()),
$recipesMain = $query4->fetchAll(PDO::FETCH_ASSOC);



$sql5 = "SELECT * FROM recipes WHERE recipes.category_id = 3 && recipes.user_id = " . $_SESSION['user']['id'];

// On prépare la requête :
$query5 = $db->prepare($sql5);

// On exécute la requête :
$query5->execute();

// On stocke le résultat dans un tableau (je récupère tout le contenu du tableau avec fetchAll()),
$recipesDessert = $query5->fetchAll(PDO::FETCH_ASSOC);



$sql6 = "SELECT * FROM recipes WHERE recipes.category_id = 4 && recipes.user_id = " . $_SESSION['user']['id'];

// On prépare la requête :
$query6 = $db->prepare($sql6);

// On exécute la requête :
$query6->execute();

// On stocke le résultat dans un tableau (je récupère tout le contenu du tableau avec fetchAll()),
$recipesDrink = $query6->fetchAll(PDO::FETCH_ASSOC);



// On ferme la connexion :
require_once __DIR__ . '/../../../globalComponents/dbConnection/dbClose.php'
?>


<div class="container mt-3">

<legend>Espace personnel</legend>

    <div class="button text-center mt-4">
        <a href="/PROJET%20PERSO/personalSpace/personalSpaceRecipeCreate/personalSpaceRecipeCreate.php"><button type="button" class="btn btn-primary">Creer une recette</button></a>
    </div>


<!-- Ici on boucle sur $recipes pour donner la forme card à chaque recette de notre base de données -->


    <!-- -->
    <?php if (isset($_SESSION["user"])) { 

        if(isset($recipes) && !empty($recipes)) { ?>

        <p>Salut <?php echo ($_SESSION["user"]["name"]) ?>, vos recettes ont l'air &#129316; <br>
        Vous avez 
        <?php echo (count($recipesStarter)); if (count($recipesStarter) <= 1) { ?> entrée, <?php } else { ?> entrées, <?php };
        echo (count($recipesMain)); if (count($recipesMain) <= 1) { ?> plat, <?php } else { ?> plats, <?php };
        echo (count($recipesDessert)); if (count($recipesDessert) <= 1) { ?> dessert et <?php } else { ?> desserts et <?php };
        echo (count($recipesDrink)); if (count($recipesDrink) <= 1) { ?> boisson. <?php } else { ?> boissons. <?php };


// A FAIRE !!!!!
// tableau avec 4 sums de cat et boucler pour savoir quel cat est la plus grande, faire un commentaire en consequence.


    } else { ?>
        <p>Salut <?php echo ($_SESSION["user"]["name"]) ?>, envie de rajouter quelques recettes ? &#129316;</p>
<?php

    }

        }

     ?>



    <?php foreach ($recipes as $recipe) : ?>

        <?php require __DIR__ . "/personalSpaceCardRecipe.php" ?>

    <?php endforeach; ?>

</div>


