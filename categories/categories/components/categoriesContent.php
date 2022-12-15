<!-- Contenu de la page categories "READ" la totalité des categories stockées dans notre bd -->
<?php
// On inclut la connexion à la base :
require_once __DIR__ . '/../../../globalComponents/dbConnection/dbConnect.php';

$sql = "SELECT * FROM categories";

// On prépare la requête :
$query = $db->prepare($sql);

// On exécute la requête :
$query->execute();

// On stocke le résultat dans un tableau (je récupère tout le contenu du tableau avec fetchAll()),
$categories = $query->fetchAll(PDO::FETCH_ASSOC);

// On ferme la connexion :
require_once __DIR__ . '/../../../globalComponents/dbConnection/dbClose.php'
?>

<div class="container mt-3 text-center">

    <div class="button">
        <a href="/PROJET%20PERSO/categories/categoriesCreate/categoriesCreate.php"><button type="button" class="btn btn-primary">Creer une categorie</button></a>
    </div>

</div>

<!-- Ici on boucle sur $users pour donner la forme card à chaque user de notre base de données -->
<div class="container mt-3">

    <?php foreach ($categories as $category) : ?>

        <?php require __DIR__ . "/categoriesButton.php" ?>

    <?php endforeach; ?>

</div>