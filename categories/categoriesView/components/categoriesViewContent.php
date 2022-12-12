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

// On ferme la connexion :
require_once __DIR__ . '/../../../globalComponents/dbConnection/dbClose.php'
?>

<!-- Ici on boucle sur $recipes pour donner la forme card à chaque recette de notre base de données -->
<div class="container mt-3">

    <p><?php echo $activeCategory['name'] /* if pour lemoji */ ?> &#127858;</p>

    <?php foreach ($recipes as $recipe) : ?>

        <?php require __DIR__ . '/categoriesViewCardRecipe.php' ?>

    <?php endforeach; ?>

</div>