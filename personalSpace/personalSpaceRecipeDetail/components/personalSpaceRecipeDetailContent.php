<!-- Page du detail de la recette Edition (user active) et de Suppression -->
<?php
// On inclut la connexion à la base :
require_once  __DIR__ . "/../../../globalComponents/dbConnection/dbConnect.php";

// Recupere l'id qui se trouve dans la requête HTTP generée au click du button "Voir la recette" depuis chaque carte recette sur la page Espace Personnel :
$recipeID = ($_GET['id']);
$sql = "SELECT * FROM recipes WHERE id = $recipeID";

// On prépare la requête :
$query = $db->prepare($sql);

// On exécute la requête :
$query->execute();

// On stocke le résultat dans un tableau (je récupère tout le contenu du tableau avec fetchAll()) :
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

// print_r($name)

// On ferme la connexion :
require_once __DIR__ . "/../../../globalComponents/dbConnection/dbClose.php";
?>

<!-- Si le résultat de la requête existe (isset) et qu'il n'est pas vide (car recette qui n'existe pas par exemple) alors affiche le détail, sinon message "Recette inexistante" : -->
<?php
if (isset($recipes) && !empty($recipes)) {
?>

    <!-- Ici le detail de la recette -->
    <div id="image-detail">
        <img src="<?php echo $recipes[0]['image']; ?>" alt="">
    </div>

    <div class="container mt-3">

        <h1><?php echo ucfirst($recipes[0]['title']); ?></h1>



        <!-- -->
        <?php foreach ($recipes as $recipe) : ?>

            <?php foreach ($name as $n) : ?>

                <?php
                if ($n['id'] === $recipe['user_id']) { ?>
                    <h6 class="card-title"> par <?php echo ($n['name']); ?></h6>

            <?php }
            endforeach; ?>

        <?php endforeach; ?>




        <div class="recipe-info">
            <div class="persons"> <?php echo strtolower($recipes[0]['persons']); ?> personnes </div>
            <div class="time"> <?php echo strtolower($recipes[0]['time']); ?> minutes </div>
        </div>

        <div class="ingredients ">
            <p class="bold">Ingredients :</p>
            <p><?php echo ucfirst($recipes[0]['ingredients']); ?></p>
        </div>

        <p class="bold">Recette :</p>
        <p><?php echo $recipes[0]['recipe']; ?></p>

        <div class="mt-3">

            <div class="button">
                <a href="/PROJET%20PERSO/personalSpace/personalSpaceRecipeEdit/personalSpaceRecipeEdit.php?id=<?php echo ($recipes[0]['id']); ?>"><button type="button" class="btn btn-primary">Editer recette</button></a>
            </div>

            <div class="button">
                <a href="/PROJET%20PERSO/personalSpace/personalSpaceRecipeDelete/personalSpaceRecipeDelete.php?id=<?php echo ($recipes[0]['id']); ?>"><button type="button" class="btn btn-primary">Supprimer recette</button></a>
            </div>

        </div>

    </div>

<?php
} else {
?>

    <div class="image-component">

        <div class="text">
            <p>Cette recette n'existe pas !</p>
        </div>

        <div class="image">
            <img src="https://images.unsplash.com/photo-1506159904226-d6cfd457c30c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="">
        </div>

    </div>

<?php
}
?>