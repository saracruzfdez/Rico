<!-- // This is the page that shows READ all the categories : -->
<?php
require_once __DIR__ . '/../../../globalComponents/sql.php';
require_once __DIR__ . '/../../../globalComponents/utils.php';

// I call de function selectCategories() :
$categories = selectCategories();

$users = selectUsersExceptConnected();
?>

<div class="container mt-3">
    <h3>Categories</h3>
    <div class="button text-center mt-3">
        <a href="/PROJET%20PERSO/categories/categoriesCreate/categoriesCreate.php"><button type="button" class="btn btn-primary">Creer une categorie</button></a>
    </div>
</div>


<!-- CONTINUER ICI !!!!!!!!!!!! -->

<!-- Ici on boucle sur $categories pour donner la forme card à chaque user de notre base de données -->
<div class="container pb-1 mt-3 mb-3">
    <div class="d-flex flex-row flex-wrap">
        <?php foreach ($categories as $category) : ?>
            <?php require __DIR__ . "/categoriesButton.php" ?>
        <?php endforeach; ?>
    </div>
</div>

<div class="container-fluid users bg-secondary">
    <?php

    // Si tu es admin affiche la liste de users :
    if (isActiveUserAdmin()) { ?>
        <div class="container mb-3">
            <h3 class="text-white ">Users</h3>
        </div>
    <?php }; ?>

    <div class="container d-flex flex-row flex-wrap">

        <?php
        foreach ($users as $user) :
            if (isActiveUserAdmin()) { ?>

                <div class="col-sm-6 col-md-6 col-lg-4 nopadding">

                    <div class="ml-1 mr-1 mb-3 bg-secondary">

                        <div class="card">

                            <div class="card-body">
                                <h5 class="card-title">Profil de <?= $user["name"] ?></h5>
                                <p><span class="bold">Email : </span><?= $user["email"] ?></p>
                                <p><span class="bold">Ville : </span><?= $user["city"] ?></p>
                            </div>

                        </div>

                    </div>

                </div>

        <?php }
        endforeach;
        ?>

    </div>

</div>