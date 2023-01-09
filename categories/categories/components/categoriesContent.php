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


//
$sql2 = "SELECT * FROM users WHERE id !=" . ($_SESSION["user"]["id"]);

// On prépare la requête :
$query2 = $db->prepare($sql2);

// On exécute la requête :
$query2->execute();

// On stocke le résultat dans un tableau (je récupère tout le contenu du tableau avec fetchAll()),
$users = $query2->fetchAll(PDO::FETCH_ASSOC);




// On ferme la connexion :
require_once __DIR__ . '/../../../globalComponents/dbConnection/dbClose.php'
?>

<div class="container mt-3">

    <h3>Categories</h3>

    <div class="button text-center mt-3">
        <a href="/PROJET%20PERSO/categories/categoriesCreate/categoriesCreate.php"><button type="button" class="btn btn-primary">Creer une categorie</button></a>
    </div>

</div>

<!-- Ici on boucle sur $users pour donner la forme card à chaque user de notre base de données -->
<div class="container pb-1 mt-3 mb-3">


    <div class="d-flex flex-row flex-wrap">

        <?php foreach ($categories as $category) : ?>

            <?php require __DIR__ . "/categoriesButton.php" ?>

        <?php endforeach; ?>

    </div>


</div>



<div class="container-fluid users bg-secondary">




    <?php

    if (stripos($_SESSION["user"]["roles"], "ROLE_ADMIN") !== false) { ?>

        <div class="container mb-3">

            <h3 class="text-white ">Users</h3>

        </div>

    <?php }; ?>




    <div class="container d-flex flex-row flex-wrap">

        <?php
        foreach ($users as $user2) :

            if (stripos($_SESSION["user"]["roles"], "ROLE_ADMIN") !== false) { ?>

                <div class="col-sm-6 col-md-6 col-lg-4 nopadding">

                    <div class="ml-1 mr-1 mb-3 bg-secondary">

                        <div class="card">

                            <div class="card-body">
                                <h5 class="card-title">Profil de <?= $user2["name"] ?></h5>
                                <p><span class="bold">Email : </span><?= $user2["email"] ?></p>
                                <p><span class="bold">Ville : </span><?= $user2["city"] ?></p>
                            </div>

                        </div>

                    </div>

                </div>

        <?php }
        endforeach;
        ?>

    </div>

</div>