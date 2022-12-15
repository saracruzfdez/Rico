<!-- Ici le contenu de l'espace personnel, permets de créer des recettes et d'afficher la totalité des recettes stockées dans notre bd de l'user logé actuellement : -->
<?php
// On inclut la connexion à la base :
require_once __DIR__ . '/../../../globalComponents/dbConnection/dbConnect.php';

$sql = "SELECT * FROM recipes WHERE recipes.user_id = $activeUser[id]";

// On prépare la requête :
$query = $db->prepare($sql);

// On exécute la requête :
$query->execute();

// On stocke le résultat dans un tableau (je récupère tout le contenu du tableau avec fetchAll()),
$recipes = $query->fetchAll(PDO::FETCH_ASSOC);

// On ferme la connexion :
require_once __DIR__ . '/../../../globalComponents/dbConnection/dbClose.php'
?>

<div class="container mt-3 text-center">

    <div class="button">
        <a href="/PROJET%20PERSO/personalSpace/personalSpaceRecipeCreate/personalSpaceRecipeCreate.php"><button type="button" class="btn btn-primary">Creer une recette</button></a>
    </div>

</div>

<!-- Ici on boucle sur $recipes pour donner la forme card à chaque recette de notre base de données -->
<div class="container mt-3">

    <p>Salut <?php echo $activeUser['name'] ?>, vos recettes ont l'air &#129316;</p>

    <?php foreach ($recipes as $recipe) : ?>

        <?php require __DIR__ . "/personalSpaceCardRecipe.php" ?>

    <?php endforeach; ?>

</div>