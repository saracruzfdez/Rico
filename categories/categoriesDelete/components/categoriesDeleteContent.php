<!-- Page de detail de suppression de cat -->
<?php
// On inclut la connexion à la base :
require_once  __DIR__ . "/../../../globalComponents/dbConnection/dbConnect.php";

// Recupere l'id qui se trouve dans la requête HTTP generée au click du button "Supprimer cat" depuis chaque carte cat sur la page ??? :
$catID = ($_GET['id']);
$sql = "SELECT * FROM categories WHERE id = $catID";

// On prépare la requête :
$query = $db->prepare($sql);

// On exécute la requête :
$query->execute();

// On stocke le résultat dans un tableau (je récupère tout le contenu du tableau avec fetchAll()) :
$categories = $query->fetchAll(PDO::FETCH_ASSOC);

// On ferme la connexion :
require_once __DIR__ . "/../../../globalComponents/dbConnection/dbClose.php";
?>

<!-- Si le résultat de la requête existe (isset) et qu'il n'est pas vide (car cat qui n'existe pas par exemple) alors question l'user sil est sur, sinon message "cat inexistante" : -->
<?php
if (isset($categories) && !empty($categories)) { ?>

    <!-- Ici le formulaire pour supprimer une user -->
    <div class="container mt-3">

    <div class="container mb-3 mt-2 text-center">

        <form action="/PROJET%20PERSO/categories/categoriesFormDelete/categoriesFormDelete.php" method="POST">

            <h3>Vous êtes sûr que vous voulez supprimer cette categorie ?</h3>

            <input type="hidden" name="id" value="<?php echo $categories[0]['id'] ?>" required>

            <button type="submit" class="btn btn-primary mt-2">Supprimer</button>

        </form>

    </div>

    </div>

<?php } else { ?>

    <div class="image-component">

        <div class="text">
            <p>Cette catégorie n'existe pas !</p>
        </div>

        <div class="image">
            <img src="https://images.unsplash.com/photo-1561380851-39b27c4f1626?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="">
        </div>

    </div>

<?php };