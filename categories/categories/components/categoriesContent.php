<!-- This is the page that shows READ all the categories, and all the users (only admin can acces here) : -->
<?php
// I call the components needed to the correct behaviour of this page
require_once __DIR__ . '/../../../globalComponents/sql.php';
require_once __DIR__ . '/../../../globalComponents/utils.php';

// if the connected user is the admin user show all the categories and users :
if (isActiveUserAdmin()) {

    // I call the functions that return data from sql queries :
    $categories = selectCategories();
    $users = selectUsersExceptConnected(); ?>

    <div class="container mt-3">
        <h3>Categories</h3>
        <div class="button text-center mt-3">
            <!-- Here is the button to create a new categorie -->
            <a href="/PROJET%20PERSO/categories/categoriesCreate/categoriesCreate.php"><button type="button" class="btn btn-primary">Creer une categorie</button></a>
        </div>
    </div>

    <!-- Here we do a Foreach Loop on $categories to show all the categories with cards -->
    <div class="container pb-1 mt-3 mb-3">
        <div class="d-flex flex-row flex-wrap">
            <?php foreach ($categories as $category) : ?>
                <?php require __DIR__ . "/categoriesButton.php" ?>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="container-fluid users bg-secondary">
        <div class="container mb-3">
            <h3 class="text-white ">Users</h3>
        </div>
        <div class="container d-flex flex-row flex-wrap">
            <?php
            foreach ($users as $user) : ?>
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
        <?php endforeach;
        }
        ?>
        </div>
    </div>