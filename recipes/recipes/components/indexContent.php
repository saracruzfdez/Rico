<!-- Contenu de la page d'accueil recettes, affiche un message de bienvenue, et "READ" la totalité des recettes stockées dans notre bd -->
<?php
// On inclut la connexion à la base :
require_once __DIR__ . '/../../../globalComponents/dbConnection/dbConnect.php';

$sql = "SELECT * FROM recipes";

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

    <h1>Bienvenue à Rico !</h1>

    <p><a href="">Connectez vous</a> pour rajouter des recettes à votre espace et créer les votres &#128521;</p>

    <?php foreach ($recipes as $recipe) : ?>

        <?php require __DIR__ . "/indexCardRecipe.php" ?>

    <?php endforeach; ?>

</div>