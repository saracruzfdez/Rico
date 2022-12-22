<!-- Ici le contenu de categorie, permets d'afficher la totalité des recettes stockées dans notre bd de la cat actuelle : -->
<?php
// On inclut la connexion à la base :
require_once __DIR__ . '/../../../globalComponents/dbConnection/dbConnect.php';

$sql = "SELECT * FROM recipes WHERE recipes.category_id =" . ($_GET['id']);

// On prépare la requête :
$query = $db->prepare($sql);

// On exécute la requête :
$query->execute();

// On stocke le résultat dans un tableau (je récupère tout le contenu du tableau avec fetchAll()),
$recipes = $query->fetchAll(PDO::FETCH_ASSOC);

// print_r($recipes);

//
$sql2 = "SELECT * FROM users";

// On prépare la requête :
$query2 = $db->prepare($sql2);

// On exécute la requête :
$query2->execute();

// On stocke le résultat dans un tableau (je récupère tout le contenu du tableau avec fetchAll()),
$name = $query2->fetchAll(PDO::FETCH_ASSOC);

//
$sql3 = "SELECT * FROM categories WHERE id =" . ($_GET['id']);

// On prépare la requête :
$query3 = $db->prepare($sql3);

// On exécute la requête :
$query3->execute();

// On stocke le résultat dans un tableau (je récupère tout le contenu du tableau avec fetchAll()),
$categories = $query3->fetchAll(PDO::FETCH_ASSOC);

// print_r($categories);


// On ferme la connexion :
require_once __DIR__ . '/../../../globalComponents/dbConnection/dbClose.php';

if (isset($categories) && !empty($categories)) {

?>

    <!-- Ici on boucle sur $recipes pour donner la forme card à chaque recette de notre base de données -->
    <div class="container mt-3">

        <!-- -->
        <?php foreach ($categories as $category) : ?>

            <legend><?php echo ($category['name']); ?></legend>

        <?php endforeach; ?>

        <?php foreach ($recipes as $recipe) : ?>

            <?php require __DIR__ . '/categoriesDetailCardRecipe.php' ?>

        <?php endforeach; ?>

    </div>

<?php } else { ?>

    <div id="image-text">

        <div id="text">
            <p>Cette categorie n'existe pas !</p>
        </div>

        <div id="image">
            <img src="https://images.unsplash.com/photo-1604739220152-cca43b1e7fe8?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8ZW1wdHklMjBkaXNoZXN8ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60" alt="">
        </div>

    </div>

<?php } ?>