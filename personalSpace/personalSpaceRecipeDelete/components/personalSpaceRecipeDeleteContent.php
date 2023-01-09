<!-- Page de detail de suppression de recette -->
<?php
// On inclut la connexion à la base :
require_once  __DIR__ . "/../../../globalComponents/dbConnection/dbConnect.php";

// Recupere l'id qui se trouve dans la requête HTTP generée au click du button "Supprimer recette" depuis chaque carte recette sur la page de detail de recette personnel :
$recipeID3 = ($_GET['id']);
$sql = "SELECT * FROM recipes WHERE id = $recipeID3";

// On prépare la requête :
$query = $db->prepare($sql);

// On exécute la requête :
$query->execute();

// On stocke le résultat dans un tableau (je récupère tout le contenu du tableau avec fetchAll()) :
$recipes = $query->fetchAll(PDO::FETCH_ASSOC);

// On ferme la connexion :
require_once __DIR__ . "/../../../globalComponents/dbConnection/dbClose.php";
?>

<!-- Si le résultat de la requête existe (isset) et qu'il n'est pas vide (car recette qui n'existe pas par exemple) alors question l'user sil est sur, sinon message "Recette inexistante" : -->
<?php
if (isset($recipes) && !empty($recipes)) { ?>

    <!-- Ici le formulaire pour supprimer une recette -->

    <div class="d-flex justify-content-center">


        <div class="col-md-8 col-lg-8 nopadding">

            <div class="container mb-3 mt-3 text-center">

                <form action="/PROJET%20PERSO/personalSpace/personalSpaceRecipeFormDelete/personalSpaceRecipeFormDelete.php" method="POST">

                    <h3>Vous êtes sûr que vous voulez supprimer la recette ?</h3>

                    <input type="hidden" name="id" value="<?php echo $recipes[0]['id'] ?>" required>

                    <button type="submit" class="btn btn-primary mt-2 ">Supprimer</button>

                </form>

            </div>

        </div>

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

<?php };
