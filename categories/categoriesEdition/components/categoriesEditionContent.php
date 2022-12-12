<!-- Page du detail de édition d'une cat -->
<?php
// On inclut la connexion à la base :
require_once  __DIR__ . "/../../../globalComponents/dbConnection/dbConnect.php";

// Recupere l'id qui se trouve dans la requête HTTP generée au click du button "Editer cat" depuis chaque carte cat sur la page cat :
$catID2 = ($_GET['id']);
$sql = "SELECT * FROM categories WHERE id = $catID2";

// On prépare la requête :
$query = $db->prepare($sql);

// On exécute la requête :
$query->execute();

// On stocke le résultat dans un tableau (je récupère tout le contenu du tableau avec fetchAll()) :
$categories = $query->fetchAll(PDO::FETCH_ASSOC);

// var_dump($users);

// On ferme la connexion :
require_once __DIR__ . "/../../../globalComponents/dbConnection/dbClose.php";
?>

<!-- Si le résultat de la requête existe (isset) et qu'il n'est pas vide (car user qui n'existe pas par exemple) alors affiche le détail, sinon message "user inexistante" : -->
<?php
if (isset($categories) && !empty($categories)) { ?>
    <!-- Ici le formulaire pour modifier une cat -->
    <div class="container mb-3 mt-2">

        <form action="/PROJET%20PERSO/categories/categoriesFormEdit/categoriesFormEdit.php" method="POST">

            <legend>Modifier la categorie</legend>

            <div class="form-group">
                <label for="name" class="form-label mt-2">Nom :</label>
                <input class="form-control" name="name" type="text" id="name" value="<?php echo $categories[0]['name'] ?>">
            </div>

            <input type="hidden" name="id" value="<?php echo $categories[0]['id'] ?>">

            <button type="submit" class="btn btn-primary mt-2">Enregistrer</button>

        </form>

    </div>

<?php } else { ?>

    <div id="image-text">

        <div id="text">
            <p>Cette cat n'existe pas !</p>
        </div>

        <div id="image">
            <img src="https://images.unsplash.com/photo-1604739220152-cca43b1e7fe8?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8ZW1wdHklMjBkaXNoZXN8ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60" alt="">
        </div>

    </div>

<?php };
