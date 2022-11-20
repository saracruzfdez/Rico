<?php
// On inclut la connexion à la base :
require_once __DIR__.'/../../globalComponents/dbConnection/dbConnect.php';

$sql = "SELECT * FROM recipes";

// On prépare la requête :
$query = $db->prepare($sql);

// On exécute la requête :
$query->execute();

// On stocke le résultat dans un tableau (je récupère tout le contenu du tableau avec fetchAll()),
$recipes = $query->fetchAll(PDO::FETCH_ASSOC);

// On ferme la connexion :
require_once __DIR__.'/../../globalComponents/dbConnection/dbClose.php'
?>

<!-- Contenu de la page d'accueil recettes, affiche un message de bienvenue et la totalité des recettes stockées dans notre bd -->
<div class="container mt-3">

    <h1>Bonjour !</h1>

    <p>Connectez vous pour rajouter des recettes à votre espace et créer les votres ;-)</p>

    <?php foreach ($recipes as $recipe) : ?>

        <?php require __DIR__."/cardRecipe.php" ?>

    <?php endforeach; ?>

</div>