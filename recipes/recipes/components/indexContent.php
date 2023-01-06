<!-- Contenu de la page d'accueil recettes, affiche un message de bienvenue, et "READ" la totalité des recettes stockées dans notre bd -->
<?php
// On inclut la connexion à la base :
require_once __DIR__ . '/../../../globalComponents/dbConnection/dbConnect.php';

$sql1 = "SELECT * FROM recipes";

// On prépare la requête :
$query1 = $db->prepare($sql1);

// On exécute la requête :
$query1->execute();

// On stocke le résultat dans un tableau (je récupère tout le contenu du tableau avec fetchAll()),
$recipes = $query1->fetchAll(PDO::FETCH_ASSOC);

//
$sql2 = "SELECT * FROM users;";

// var_dump($sql2);

// On prépare la requête :
$query2 = $db->prepare($sql2);

// On exécute la requête :
$query2->execute();

// On stocke le résultat dans un tableau (je récupère tout le contenu du tableau avec fetchAll()),
$name = $query2->fetchAll(PDO::FETCH_ASSOC);

// print_r($name);





$sql3 = "SELECT * FROM categories";

// On prépare la requête :
$query3 = $db->prepare($sql3);

// On exécute la requête :
$query3->execute();

// On stocke le résultat dans un tableau (je récupère tout le contenu du tableau avec fetchAll()),
$categories = $query3->fetchAll(PDO::FETCH_ASSOC);





// On ferme la connexion :
require_once __DIR__ . '/../../../globalComponents/dbConnection/dbClose.php'
?>

<!-- Ici on boucle sur $recipes pour donner la forme card à chaque recette de notre base de données -->
<div class="container mt-3">

    <h1>Bienvenue à Rico !</h1>

    <p>Connectez-vous pour rajouter des recettes à vos favoris et créer les votres dans votre espace personnel &#128521;</p>






<!-- Ici on boucle sur ????? -->
<div class="container d-flex flex-row justify-content-between">

    <?php foreach ($categories as $category) : ?>

        <?php require __DIR__ . "/categorie.php" ?>

    <?php endforeach; ?>

</div>







    <?php foreach ($recipes as $recipe) : ?>

        <?php require __DIR__ . "/indexCardRecipe.php" ?>

    <?php endforeach; ?>

</div>