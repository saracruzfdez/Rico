<!-- Ici le contenu de categorie, permets d'afficher la totalité des recettes stockées dans notre bd de la cat actuelle : -->
<?php
// On inclut la connexion à la base :
require_once __DIR__ . '/../../../globalComponents/dbConnection/dbConnect.php';

$sql = "SELECT * FROM recipes WHERE recipes.category_id = $activeCategory[id]";

// On prépare la requête :
$query = $db->prepare($sql);

// On exécute la requête :
$query->execute();

// On stocke le résultat dans un tableau (je récupère tout le contenu du tableau avec fetchAll()),
$recipes = $query->fetchAll(PDO::FETCH_ASSOC);


//
$sql2 = "SELECT * FROM users";

// On prépare la requête :
$query2 = $db->prepare($sql2);

// On exécute la requête :
$query2->execute();

// On stocke le résultat dans un tableau (je récupère tout le contenu du tableau avec fetchAll()),
$name = $query2->fetchAll(PDO::FETCH_ASSOC);


//
$sql3 = "SELECT name FROM categories";

// On prépare la requête :
$query3 = $db->prepare($sql3);

// On exécute la requête :
$query3->execute();

// On stocke le résultat dans un tableau (je récupère tout le contenu du tableau avec fetchAll()),
$categories = $query3->fetchAll(PDO::FETCH_ASSOC);

// print_r($categories);


// On ferme la connexion :
require_once __DIR__ . '/../../../globalComponents/dbConnection/dbClose.php'
?>

<!-- Ici on boucle sur $recipes pour donner la forme card à chaque recette de notre base de données -->
<div class="container mt-3">




    <!-- -->
    <?php
    $recipeID5 = ($_GET['id']);
    ?>

    <p><?php switch ($recipeID5) {
            case 1:
                echo "Entrées"." &#127861";
                break;
            case 2:
                echo "Plats"." &#127837";
                break;
            case 3:
                echo "Desserts"." &#127847";
                break;
        }; ?>;</p>





    <?php foreach ($recipes as $recipe) : ?>

        <?php require __DIR__ . '/categoriesDetailCardRecipe.php' ?>

    <?php endforeach; ?>

</div>