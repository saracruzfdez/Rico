<?php
// On inclut la connexion à la base :
require_once  __DIR__ . "/../../globalComponents/dbConnection/dbConnect.php";

// Recupere l'id qui se trouve dans la requête HTTP generée au click du button "Voir la recette" depuis chaque carte recette sur la page d'accueil :
$recipeID = ($_GET['id']);
$sql = "SELECT * FROM recipes WHERE id = $recipeID";

// On prépare la requête :
$query = $db->prepare($sql);

// On exécute la requête :
$query->execute();

// On stocke le résultat dans un tableau (je récupère tout le contenu du tableau avec fetchAll()),
// $recipes = $query->fetchAll(PDO::FETCH_ASSOC);

$recipes = $query->fetchAll(PDO::FETCH_ASSOC);

// On ferme la connexion :
require_once __DIR__ . "/../../globalComponents/dbConnection/dbClose.php";
?>

<!-- Si le résultat de la requête existe (isset) et que il n'est pas vide (car recette qui n'existe pas par exemple) alors affiche le détail, sinon message "Recete inexistante" : -->
<?php
if (isset($recipes) && !empty($recipes)) {
?>

    <!-- Ici le detail de la recette -->
    <div id="image-detail">
        <img src="<?php echo $recipes[0]['image']; ?>" alt="">
    </div>

    <div class="container mt-3">

        <h1><?php echo ucfirst($recipes[0]['title']); ?></h1>
        <h6>par <?php echo ucwords($recipes[0]['user_id']); ?></h6>

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

        <div class="navigation">

            <div class="button">
                <button type="button" class="btn btn-primary">Ajouter recette</button>
            </div>
            
            <!-- <div class="nav-item">
                <a class="nav-link" href="/PROJET%20PERSO/recipe/components/detailRecipe.php">Retour</a>
            </div> --> 
        
        </div>
            
    </div>

<?php
} else {
?>

    <div id="image-text">

        <div id="text">
            <p>Cette recette n'existe pas !</p>
        </div>

        <div id="image">
            <img src="https://images.unsplash.com/photo-1604739220152-cca43b1e7fe8?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8ZW1wdHklMjBkaXNoZXN8ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60" alt="">
        </div>

    </div>

<?php
}
?>