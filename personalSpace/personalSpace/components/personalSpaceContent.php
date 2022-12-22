<!-- Ici le contenu de l'espace personnel, permets de créer des recettes et d'afficher la totalité des recettes stockées dans notre bd de l'user logé actuellement : -->
<?php
// On inclut la connexion à la base :
require_once __DIR__ . '/../../../globalComponents/dbConnection/dbConnect.php';



$sql = "SELECT * FROM recipes WHERE recipes.user_id = " . $_SESSION['user']['id'];



// print_r($sql);
// print_r($_SESSION);


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

// print_r($name);





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
        if(isset($recipes) && !empty($recipes)) {

            ?>
        <p>Salut <?php echo ($_SESSION["user"]["name"]) ?>, vos recettes ont l'air &#129316;</p>
        <?php
    } else { ?>
        <p>Salut <?php echo ($_SESSION["user"]["name"]) ?>, envie de rajouter quelques recettes ? &#129316;</p>
<?php
    }
    } ?>



    <?php foreach ($recipes as $recipe) : ?>

        <?php require __DIR__ . "/personalSpaceCardRecipe.php" ?>

    <?php endforeach; ?>

</div>


