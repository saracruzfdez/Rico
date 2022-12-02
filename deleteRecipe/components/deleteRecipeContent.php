<!-- Page de detail de suppression de recette -->
<?php
// On inclut la connexion à la base :
require_once  __DIR__ . "/../../globalComponents/dbConnection/dbConnect.php";

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
require_once __DIR__ . "/../../globalComponents/dbConnection/dbClose.php";
?>

<!-- Si le résultat de la requête existe (isset) et qu'il n'est pas vide (car recette qui n'existe pas par exemple) alors question l'user sil est sur, sinon message "Recette inexistante" : -->
<?php
if (isset($recipes) && !empty($recipes)) { ?>

    <!-- Ici le formulaire pour supprimer une recette -->
    <div class="container mb-3 mt-2">

        <form action="/PROJET%20PERSO/formDelete/formDelete.php" method="POST">

            <legend>Vous êtes sûr que vous voulez supprimer la recette ?</legend>

            <input type="hidden" name="id" value="<?php echo $recipes[0]['id'] ?>">

            <button type="submit" class="btn btn-primary mt-2">Supprimer</button>

        </form>

    </div>

<?php } else { ?>

    <div id="image-text">

        <div id="text">
            <p>Cette recette n'existe pas !</p>
        </div>

        <div id="image">
            <img src="https://images.unsplash.com/photo-1604739220152-cca43b1e7fe8?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8ZW1wdHklMjBkaXNoZXN8ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60" alt="">
        </div>

    </div>

<?php };