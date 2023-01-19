<!-- Page du detail de la recette Edition (user active) et de Suppression -->
<?php
// On inclut la connexion à la base :
require_once  __DIR__ . "/../../../globalComponents/sql.php";

// On stocke le résultat dans un tableau (je récupère tout le contenu du tableau avec fetchAll()) :
$recipe = selectRecipeById($_GET['id']);

// On stocke le résultat dans un tableau (je récupère tout le contenu du tableau avec fetchAll()),
$users = selectUsers();

?>

<!-- Si le résultat de la requête existe (isset) et qu'il n'est pas vide (car recette qui n'existe pas par exemple) alors affiche le détail, sinon message "Recette inexistante" : -->
<?php
if (isset($recipe)) {
?>

    <!-- Ici le detail de la recette -->
    <div id="image-detail">
        <img src="<?php echo $recipe['image']; ?>" alt="">
    </div>

    <div class="container mt-3">

        <h1><?php echo ucfirst($recipe['title']); ?></h1>


        <?php foreach ($users as $user) : ?>
            <?php
            if ($user['id'] === $recipe['user_id']) { ?>
                <h6 class="card-title"> par <?php echo ($user['name']); ?></h6>

        <?php }
        endforeach; ?>


        <div class="recipe-info">
            <div class="persons"> <?php echo strtolower($recipe['persons']); ?> personnes </div>
            <div class="time"> <?php echo strtolower($recipe['time']); ?> minutes </div>
        </div>

        <div class="ingredients ">
            <p class="bold">Ingredients :</p>
            <p><?php echo ucfirst($recipe['ingredients']); ?></p>
        </div>

        <p class="bold">Recette :</p>
        <p><?php echo $recipe['recipe']; ?></p>

        <div class="mt-3">

            <div class="button">
                <a href="/PROJET%20PERSO/personalSpace/personalSpaceRecipeEdit/personalSpaceRecipeEdit.php?id=<?php echo ($recipe['id']); ?>"><button type="button" class="btn btn-primary">Editer recette</button></a>
            </div>

            <div class="button">
                <a href="/PROJET%20PERSO/personalSpace/personalSpaceRecipeDelete/personalSpaceRecipeDelete.php?id=<?php echo ($recipe['id']); ?>"><button type="button" class="btn btn-primary">Supprimer recette</button></a>
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