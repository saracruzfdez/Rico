<!-- Page du detail de la recette -->
<?php
// On inclut la connexion à la base :
require_once  __DIR__ . "/../../../globalComponents/sql.php";

$recipe = selectRecipeById($_GET['id']);

?>

<!-- Si le résultat de la requête existe (isset) et qu'il n'est pas vide (car recette qui n'existe pas par exemple) alors affiche le détail, sinon message "Recette inexistante" : -->
<?php if (isset($recipe)) { 
    
    $user = selectUserById($recipe["user_id"]);

    ?>
    <!-- Ici le detail de la recette -->
    <div class="image-banner">
        <img src="<?php echo $recipe['image']; ?>" alt="">
    </div>

    <div class="container mt-3">

        <h3><?php echo ucfirst($recipe['title']); ?></h3>

        <!-- Si user existant auteur ou pas de la recette, afficher celle-ci. Si user inexistant l'afficher aussi : (L'ORDRE DE CE CODE EST IMPORTANT !) -->
        <?php if (isset($user)) { ?>
            <h6 class="card-title"> par <?php echo ($user['name']); ?></h6>

        <?php } else { ?>
            <h6 class="card-title"> par : Utilisateur introuvable </h6>

        <?php } ?>

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

        <!-- L'ORDRE DU CODE SUIVANT EST IMPORTANT ! -->
        <!-- Si pas de user connecté, rien : -->
        <?php if (!isset($_SESSION["user"]) && empty($_SESSION["user"])) { ?>

            <!-- Si user connecté mais auteur recette , possibilité d'ajouter aux favoris : -->
        <?php } elseif (isset($_SESSION["user"]) && !empty($_SESSION["user"]) && !isset($recipe['user_id'])) { ?>

            <div class="button">
                <button type="button" class="btn btn-primary">Ajouter aux favorits</button>
            </div>


            <!-- Si user connecté mais est sur recette d'un autre user existant et non connecté, possibilité d'ajouter aux favoris : -->
        <?php } elseif ($_SESSION["user"]["id"] === $recipe["user_id"]) { ?>

            <div class="mt-3">

                <div class="button">
                    <a href="/PROJET%20PERSO/personalSpace/personalSpaceRecipeEdit/personalSpaceRecipeEdit.php?id=<?php echo ($recipe['id']); ?>"><button type="button" class="btn btn-primary">Editer recette</button></a>
                </div>

                <div class="button">
                    <a href="/PROJET%20PERSO/personalSpace/personalSpaceRecipeDelete/personalSpaceRecipeDelete.php?id=<?php echo ($recipe['id']); ?>"><button type="button" class="btn btn-primary">Supprimer recette</button></a>
                </div>

            </div>

            <!-- Si user connecté et est l'auteur de la recette, possibilité d'éditer et supprimer recette : -->
        <?php } elseif (isset($_SESSION["user"]) && !empty($_SESSION["user"]) && ($_SESSION["user"]["id"] !== isset($recipe['user_id']))) { ?>

            <div class="button">
                <button type="button" class="btn btn-primary">Ajouter aux favorits</button>
            </div>

        <?php }; ?>

    </div>

<?php } else { ?>

    <div class="image-component">

<div class="text">
    <p>Cette recette n'existe pas !</p>
</div>

<div class="image">
    <img src="https://images.unsplash.com/photo-1506159904226-d6cfd457c30c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="">
</div>

</div>

<?php } ?>